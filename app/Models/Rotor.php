<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rotor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function turbine(): BelongsTo
    {
        return $this->belongsTo(Turbine::class);
    }

    public function damageAndWear(): BelongsTo
    {
        return $this->belongsTo(DamageAndWear::class);
    }    
}
