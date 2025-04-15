<?php
namespace App\Enums;

enum MerchantStatusEnum :int
{
    case ACTIVE = 1;
    case INACTIVE = 0;
    case PENDING = 2;
}
