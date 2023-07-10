<?php

namespace App\Services;

use App\Contracts\PlayerServiceInterface;
use App\Data\MarketplaceData;
use App\Events\PlayerSold;
use App\Http\Requests\Player\UpdatePlayerRequest;
use App\Models\Marketplace;
use App\Models\Player\Player;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;

final readonly class PlayerService implements PlayerServiceInterface
{
    public function __construct(
        private ResponseFactory $responseFactory,
    ) {
    }

    public function publish(MarketplaceData $data): JsonResponse
    {
        Marketplace::create($data->toArray());

        return $this->responseFactory->json(data: [
            'message' => __('marketplace.player_placed')
        ], status: 200);
    }


    public function update(Player $player, UpdatePlayerRequest $request): JsonResponse
    {
        $player->update($request->validated());

        return $this->responseFactory->json(['message' => 'updated successfully']);
    }


}
