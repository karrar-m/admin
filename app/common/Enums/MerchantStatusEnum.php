<?php

namespace App\Common\Enums;

enum MerchantStatusEnum: string
{
    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
    case PENDING = 'PENDING';
}