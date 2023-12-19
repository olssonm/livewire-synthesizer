<?php

namespace Olssonm\LivewireSynthesizer\Resources;

use Illuminate\Contracts\Support\Arrayable;

class GenericResource implements Arrayable
{
    protected $attributes = [];

    public function __construct(array $data = [])
    {
        foreach ($data as $attribute => $value) {
            $this->attributes[$attribute] = $value ?? null;
        }
    }

    public function toArray(): array
    {
        return $this->attributes;
    }

    public function __get($attribute)
    {
        return $this->attributes[$attribute] ?? null;
    }

    public function __set($attribute, $value)
    {
        $this->attributes[$attribute] = $value;
    }
}
