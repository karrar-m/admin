<?php

namespace App\Common\Enums;

use App\Common\Attributes\Description;

enum UserType: int
{
    use EnumExtensions;
    
    #[Description('زبون')]
    case Customer = 1;
    #[Description('تاجر')]
    case Merchant = 2;
    #[Description('ادمن')]
    case Admin = 3;
    #[Description('مشغل')]
    case Operator = 4;
}