<?php

namespace App\Common\Enums;

enum StatusEnum :int
{
  case UNKNOWN = 0;
  case PENDING = 1;
  case ACTIVE = 2;
}