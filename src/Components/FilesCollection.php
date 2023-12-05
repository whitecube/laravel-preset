<?php

namespace Whitecube\LaravelPreset\Components;

use Illuminate\Support\Collection;

class FilesCollection extends Collection
{
    /**
     * Create a new collection instance.
     */
    public static function make($items = []): static
    {
        return new static(array_filter($items, fn($item) => is_a($item, File::class)));
    }

    /**
     * Insert a new publishable file.
     */
    public function append(string $stub, string $destination): ?File
    {
        if(! ($file = File::make($stub, $destination))) {
            return null;
        }

        $this->items[] = $file;

        return $file;
    }

    /**
     * Create all registered files and return their publication status.
     */
    public function publish(): array
    {
        return $this->mapWithKeys(function($file) {
            return [$file->getDestination() => $file->publish()];
        })->toArray();
    }
}
