<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerPosition extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
