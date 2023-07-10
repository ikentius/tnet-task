<?php

namespace App\Models;

use App\Models\Player\Player;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Marketplace extends Model
{
    use HasFactory;

    protected $table = 'player_marketplace';

    protected $fillable = ['player_id', 'price'];

    public function player(): Relation
    {
        return $this->belongsTo(Player::class);
    }
}
