<?php

namespace Whitecube\LaravelPreset\Components;

interface PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string;

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection;

    /**
     * Get the component's usage instructions
     */
    public function instructions(): ?string;
}
