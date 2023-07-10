<?php

namespace App\Policies;

use App\Models\Player\Player;
use App\Models\User;

class PlayerPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Player $player)
    {
        return $user->team->id === $player->team->id;
    }

    public function publish(User $user, Player $player)
    {
        return $user->team->id === $player->team->id;
    }
}
