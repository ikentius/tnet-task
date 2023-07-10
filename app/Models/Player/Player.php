<?php

namespace App\Models\Player;

use App\Models\Country\Country;
use App\Models\Marketplace;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'first_name',
        'last_name',
        'age',
        'value',
        'country_id'
    ];


    public function country(): Relation
    {
        return $this->belongsTo(Country::class);
    }

    public function position(): Relation
    {
        return $this->belongsTo(PlayerPosition::class);
    }

    public function team(): Relation
    {
        return $this->belongsTo(Team::class);
    }

    public function marketplace(): Relation
    {
        return $this->hasOne(Marketplace::class);
    }
}
