<?php

namespace App\Contracts;

use App\Models\Marketplace;
use Illuminate\Http\JsonResponse;

interface MarketplaceServiceInterface
{
    public function index():JsonResponse;

    public function sell(Marketplace $marketplace);
}
