<?php

namespace App\Listeners;

use App\Enums\PlayerPositionsEnum;
use App\Models\Player\Player;
use App\Models\Team;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateTeam implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $team = Team::factory()->for($event->user)->create(
            [
                'value' => 15_000_000,
                'budget' => 5_000_000,
            ]
        );

        Player::factory()
            ->count(3)
            ->for($team)
            ->create([
                'position_id' => PlayerPositionsEnum::GOALKEEPER->value
            ]);

        Player::factory()
            ->count(6)
            ->for($team)
            ->create([
                'position_id' => PlayerPositionsEnum::MIDFIELDER->value
            ]);

        Player::factory()
            ->count(6)
            ->for($team)
            ->create([
                'position_id' => PlayerPositionsEnum::STRIKER->value
            ]);

    }
}
