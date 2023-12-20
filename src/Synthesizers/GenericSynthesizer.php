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

    public function dehydrate($target, $dehydrateCallback)
    {
        $data = [];
        foreach ($target->toArray() as $key => $value) {
            $data[$key] = $dehydrateCallback($key, $value);
        }

        return [$data, [
            'class' => static::$class,
        ]];
    }

    public function hydrate($value, $meta, $hydrateCallback)
    {
        $instance = new $meta['class']();

        foreach ($value as $key => $value) {
            $instance->{$key} = $hydrateCallback($key, $value);
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
