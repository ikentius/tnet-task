<?php

namespace App\Http\Controllers;

use App\Contracts\MarketplaceServiceInterface;
use App\Events\PlayerSold;
use App\Models\Marketplace;
use App\Models\Player\Player;
use App\Services\MarketplaceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class MarketplaceController extends Controller
{
    public function __construct(
        private readonly MarketplaceServiceInterface $marketplaceService
    )
    {
    }

    public function index(): JsonResponse
    {
        return $this->marketplaceService->index();
    }

    public function sell(Marketplace $marketplace)
    {
        return $this->marketplaceService->sell($marketplace);
    }
}
