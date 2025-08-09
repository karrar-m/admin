<?php

namespace App\Common\Attributes;

use Attribute;

#[Attribute]
class Description
{
    public function __construct(public string $value) {}
}
