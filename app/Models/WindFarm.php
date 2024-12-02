<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WindFarm extends Model
{
    use HasFactory;

    protected $appends = [
        'turbine_count',
    ];

    protected function turbineCount(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->turbines()->count();
            }
        );
    }

    public function turbines(): HasMany
    {
        return $this->hasMany(Turbine::class);
    }
}
