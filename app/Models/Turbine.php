<?php

namespace App\Models;

use App\Enum\TurbineStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turbine extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => TurbineStatusEnum::class,
    ];
}
