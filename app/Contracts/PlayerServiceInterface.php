<?php

namespace App\Contracts;

use App\Data\MarketplaceData;
use App\Http\Requests\Player\UpdatePlayerRequest;
use App\Models\Player\Player;
use Illuminate\Http\JsonResponse;

interface PlayerServiceInterface
{
    public function publish(MarketplaceData $data): JsonResponse;

    public function update(Player $player,UpdatePlayerRequest $request): JsonResponse;
}
