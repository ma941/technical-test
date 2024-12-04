<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DamageAndWear extends Model
{
    use HasFactory;

    public function blades(): HasMany
    {
        return $this->hasMany(Blade::class);
    }

    public function rotors(): HasMany
    {
        return $this->hasMany(Rotor::class);
    }

    public function hubs(): HasMany
    {
        return $this->hasMany(Hub::class);
    }
}
