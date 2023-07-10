<?php

namespace App\Providers;

use App\Contracts\AuthenticationInterface;
use App\Contracts\MarketplaceServiceInterface;
use App\Contracts\PlayerServiceInterface;
use App\Contracts\UserManagementServiceInterface;
use App\Contracts\UserTeamServiceInterface;
use App\Services\MarketplaceService;
use App\Services\PlayerService;
use App\Services\SanctumAuthenticationService;
use App\Services\UserManagementService;
use App\Services\UserTeamService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserManagementServiceInterface::class, UserManagementService::class);

        $this->app->bind(UserTeamServiceInterface::class, UserTeamService::class);

        $this->app->bind(PlayerServiceInterface::class, PlayerService::class);

        $this->app->bind(MarketplaceServiceInterface::class, MarketplaceService::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
