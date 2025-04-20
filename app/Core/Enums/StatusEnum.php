<?php

namespace App\Core\Enums;

enum StatusEnum :int
{
  case UNKNOWN = 0;
  case PENDING = 1;
  case ACTIVE = 2;
}