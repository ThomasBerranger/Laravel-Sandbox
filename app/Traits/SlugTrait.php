<?php

namespace App\Traits;

trait SlugTrait
{
    public function setNameAttribute(string $name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_replace(' ', '_', strtolower($name));
    }
}
