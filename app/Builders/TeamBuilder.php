<?php

namespace App\Builders;
use Illuminate\Database\Eloquent\Builder;

class TeamBuilder extends Builder
{
    public function whereUser(int $id): self
    {
        return $this->where('user_id', $id);
    }
}
