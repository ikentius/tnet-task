<?php

namespace App\Listeners;

use App\Events\PlayerSold;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Random\Randomizer;
class IncreasePlayerMarketValue implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct(
        private readonly Randomizer $randomizer
    )
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PlayerSold $event): void
    {
        $percentage = $this->randomizer->getInt(10,100) / 100;
        $event->player->value += $event->player->value * $percentage;
        $event->player->save();
    }
}
