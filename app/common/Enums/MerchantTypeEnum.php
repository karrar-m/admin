<?php

namespace App\Core\Enums;

enum MerchantTypeEnum: string
{
    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
    case PENDING = 'PENDING';
}