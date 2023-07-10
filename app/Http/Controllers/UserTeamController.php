<?php

namespace App\Http\Controllers;

use App\Contracts\UserTeamServiceInterface;
use App\Http\Requests\Team\UpdateTeamRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class UserTeamController extends Controller
{
    public function __construct(
        private readonly UserTeamServiceInterface $userTeam,

    ) {
    }

    public function update(UpdateTeamRequest $request): JsonResponse
    {
        $this->authorize('update');

        return $this->userTeam->update($request);
    }

    public function show(): JsonResponse
    {
        return $this->userTeam->show();
    }
}
