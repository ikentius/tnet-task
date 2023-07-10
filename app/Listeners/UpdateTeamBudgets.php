<?php

namespace App\Listeners;

use App\Events\PlayerSold;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateTeamBudgets implements ShouldQueue
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
    public function handle(PlayerSold $event): void
    {
        $event->sellerTeam->budget += $event->price;
        $event->buyerTeam->budget -= $event->price;

        $event->buyerTeam->save();
        $event->sellerTeam->save();
    }
}
