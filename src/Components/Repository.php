<?php

namespace Whitecube\LaravelPreset\Components;

use Illuminate\Support\Collection;

class Repository
{
    /**
     * The available publishable components.
     */
    protected Collection $components;

    /**
     * Create a new components repository instance.
     */
    public function __construct()
    {
        $this->components = collect(static::scan())->mapWithKeys(function($classname) {
            return [$classname => new $classname];
        });
    }

    /**
     * List all available component publishers.
     */
    public static function scan(): array
    {
        $path = realpath(__DIR__ . '/Publishers');

        if(! $path) {
            return [];
        }

        $publishers = [];

        foreach(scandir($path) as $item) {
            if(in_array($item, ['.','..'])) {
                continue;
            }

            $classname = 'Whitecube\\LaravelPreset\\Components\\Publishers\\'.ucfirst(basename($item, '.php'));

            if(! class_exists($classname) || ! is_a($classname, PublisherInterface::class, true)) {
                continue;
            }

            $publishers[] = $classname;
        }

        return $publishers;
    }

    /**
     * List all available component publishers.
     */
    public function getOptions(): array
    {
        return $this->components
            ->map(fn($publisher) => $publisher->label())
            ->toArray();
    }

    /**
     * Get a specific component publisher's instance.
     */
    public function get(string $classname): ?PublisherInterface
    {
        return $this->components->get($classname);
    }
}
