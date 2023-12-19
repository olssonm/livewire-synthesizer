<?php

namespace Olssonm\LivewireSynthesizer\Synthesizers;

use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;

class GenericSynthesizer extends Synth
{
    private static $class;

    public static function match($target)
    {
        return $target instanceof static::$class;
    }

    public function dehydrate($target)
    {
        $data = [];
        foreach ($target->toArray() as $key => $value) {
            $data[$key] = $value;
        }

        return [$data, []];
    }

    public function hydrate($value)
    {
        $instance = new static::$class;

        foreach ($value as $key => $value) {
            $instance->{$key} = $value;
        }

        return $instance;
    }

    public function get(&$target, $key)
    {
        return $target->{$key};
    }

    public function set(&$target, $key, $value)
    {
        $target->{$key} = $value;
    }
}
