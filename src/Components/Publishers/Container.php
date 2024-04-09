<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class Container implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'Container';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/container/style.scss',
            destination: resource_path('sass/parts/_container.scss'),
        );

        $view = File::makeFromStub(
            stub: 'components/container/view.blade.php',
            destination: resource_path('views/components/container.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/container/Component.php',
            destination: base_path('app/View/Components/Container.php'),
        );

        return FilesCollection::make([$style, $view, $component]);
    }

    /**
     * Get the component's usage instructions
     */
    public function instructions(): ?string
    {
        return "1. Add `@import 'parts/post';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-container cols=\"4\">{{-- your content --}}</x-container>`";
    }
}
