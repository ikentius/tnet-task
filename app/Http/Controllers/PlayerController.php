<?php

namespace App\Http\Controllers;

use App\Contracts\PlayerServiceInterface;
use App\Data\MarketplaceData;
use App\Http\Requests\Player\PublishPlayerToMarketplaceRequest;
use App\Http\Requests\Player\UpdatePlayerRequest;
use App\Models\Player\Player;

final class PlayerController extends Controller
{
    public function __construct(
        private readonly PlayerServiceInterface $playerService
    ) {
    }
    protected function resourceAbilityMap()
    {
        return array_merge(parent::resourceAbilityMap(), [
            'publish' => 'publish'
        ]);
    }

    public function publish(Player $player, PublishPlayerToMarketplaceRequest $request)
    {
        $this->authorize('publish', $player);

        return $this->playerService->publish(new MarketplaceData(playerId: $player->id, price: $request->price));
    }

    public function update(Player $player, UpdatePlayerRequest $request)
    {
        $this->authorize('update', $player);

        return $this->playerService->update($player, $request);
    }

}
