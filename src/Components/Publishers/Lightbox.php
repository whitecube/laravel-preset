<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class Lightbox implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'Lightbox';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/lightbox/style.scss',
            destination: resource_path('sass/parts/_lightbox.scss'),
        );

        $view = File::makeFromStub(
            stub: 'components/lightbox/view.blade.php',
            destination: resource_path('views/components/lightbox.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/lightbox/Component.php',
            destination: base_path('app/View/Components/Lightbox.php'),
        );

        return FilesCollection::make([
            $style,
            $view,
            $component,
        ]);
    }

    /**
     * Get the component's usage instructions
     */
    public function instructions(): ?string
    {
        return "1. Add `@import 'parts/lightbox';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-button tag=\"a\" href=\"#lightbox-1\" data-lightbox=\"lightbox-1\">Open lightbox</x-button> <x-lightbox name=\"lightbox-1\"> </x-lightbox>`";
    }
}
