<?php

namespace App\Traits;

trait SlugTrait
{
    public function setNameAttribute(string $name): void
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str($name)->slug();
    }
}
