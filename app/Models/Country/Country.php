<?php

namespace App\Models\Country;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = ['code'];
    public array $translatedAttributes = ['name'];
}
