<?php

namespace App\Common\Enums;

use ReflectionEnum;
use App\Common\Attributes\Description;

trait EnumExtensions
{
    public function GetDescription(): string
    {
        $reflection = new ReflectionEnum($this);
        $case = $reflection->getCase($this->name);
        
        $attributes = $case->getAttributes(Description::class);
        
        if (!empty($attributes)) {
            /** @var Description $description */
            $description = $attributes[0]->newInstance();
            return $description->value;
        }
        
        return $this->name;
    }
}