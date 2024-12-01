<?php

namespace App\Enum;

enum TurbineStatusEnum: string
{
    case ACTIVE = 'Active';
    case MAINTENANCE = 'Maintenance';
    case DECOMMISSIONED = 'Decommissioned';
}
