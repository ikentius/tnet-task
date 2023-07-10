<?php

namespace App\Models;

use App\Builders\TeamBuilder;
use App\Models\Country\Country;
use App\Models\Player\Player;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'country_id'
    ];

    public function  user(): Relation
    {
        return $this->belongsTo(User::class);
    }

    public function country(): Relation
    {
        return $this->belongsTo(Country::class);
    }

    public function players(): Relation
    {
        return $this->hasMany(Player::class);
    }

    public function newEloquentBuilder($query): TeamBuilder
    {
        return new TeamBuilder($query);
    }
}
