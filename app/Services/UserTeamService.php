<?php

namespace App\Services;

use App\Contracts\UserTeamServiceInterface;
use App\Http\Requests\Team\UpdateTeamRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;

final readonly class UserTeamService implements UserTeamServiceInterface
{

    public function __construct(
        private AuthManager $authManager,
        private ResponseFactory $responseFactory,

    ) {
    }

    public function show(): JsonResponse
    {
        $team = Team::with(['players.country', 'country', 'players.position'])
            ->whereUser($this->authManager->id())
            ->first();


        return $this->responseFactory->json(data: TeamResource::make($team));
    }

    public function update(UpdateTeamRequest $request): JsonResponse
    {
        $team = Team::where('user_id', $this->authManager->id())->first();

        $team->update($request->validated());

        return $this->responseFactory->json(['message' => 'updated successfully']);
    }
}
