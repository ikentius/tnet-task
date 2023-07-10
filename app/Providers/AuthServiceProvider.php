<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Contracts\AuthenticationInterface;
use App\Models\Player\Player;
use App\Models\Team;
use App\Policies\PlayerPolicy;
use App\Policies\TeamPolicy;
use App\Services\SanctumAuthenticationService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Player::class => PlayerPolicy::class,
        Team::class => TeamPolicy::class,
    ];

    public function register()
    {
        $this->app->bind(AuthenticationInterface::class, SanctumAuthenticationService::class);
    }

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
