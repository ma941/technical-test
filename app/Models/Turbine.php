<?php

namespace App\Models;

use App\Enum\TurbineStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Turbine extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => TurbineStatusEnum::class,
    ];

    protected $appends = [
        'formatted_inspection_date',
        'formatted_power_output'
    ];

    protected function formattedInspectionDate(): Attribute
    {
        return Attribute::make(
            get: function () {
                return Carbon::parse($this->inspection_date)->format('d/m/Y');
            }
        );
    }

    protected function formattedPowerOutput(): Attribute
    {
        return Attribute::make(
            get: function () {
                return number_format($this->power_output, 2) . 'MW';
            }
        );
    }

    public function windFarm(): BelongsTo
    {
        return $this->belongsTo(WindFarm::class);
    }

    public function blades(): HasMany
    {
        return $this->hasMany(Blade::class);
    }
}
