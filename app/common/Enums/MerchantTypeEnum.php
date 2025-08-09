<?php

namespace App\Common\Enums;

enum MerchantTypeEnum: string
{
    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
    case PENDING = 'PENDING';
}