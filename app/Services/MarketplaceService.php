<?php

namespace App\Services;

use App\Contracts\MarketplaceServiceInterface;
use App\Events\PlayerSold;
use App\Http\Resources\MarketplaceResource;
use App\Models\Marketplace;
use App\Models\Player\Player;
use App\Models\Team;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\JsonResponse;

final readonly class MarketplaceService implements MarketplaceServiceInterface
{
    public function __construct(
        private AuthManager $authManager,
        private ResponseFactory $responseFactory,
        private Dispatcher $eventDispatcher,
    ) {
    }

    public function index(): JsonResponse
    {
        $data = Marketplace::with(['player', 'player.country', 'player.team'])->get();

        return $this->responseFactory->json(data: MarketplaceResource::collection($data));
    }

    public function sell(Marketplace $marketplace): JsonResponse
    {
        $buyerTeam = Team::whereUser($this->authManager->id())->first();

        $sellerTeam = Team::whereHas('players', function ($query) use ($marketplace) {
            $query->where('id', $marketplace->player_id);
        })->first();

        $player = Player::where('id', $marketplace->player_id)->first();

        $player->team()->associate($buyerTeam);
        $player->save();

        $this->eventDispatcher->dispatch(
            new PlayerSold(
                sellerTeam: $sellerTeam,
                buyerTeam: $buyerTeam,
                player: $player,
                price: $marketplace->price
            )
        );

        return $this->responseFactory->json(data: ['message' => 'transfer successful']);
    }
}
