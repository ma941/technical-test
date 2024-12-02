<?php

namespace App\Models;

use App\Enum\TurbineStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Turbine extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => TurbineStatusEnum::class,
    ];

    public function windFarm(): BelongsTo
    {
        return $this->belongsTo(WindFarm::class);
    }
}
