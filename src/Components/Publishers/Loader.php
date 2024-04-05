<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class Loader implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'Loader';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/loader/style.scss',
            destination: resource_path('sass/parts/_loader.scss'),
        );

        $view = File::makeFromStub(
            stub: 'components/loader/view.blade.php',
            destination: resource_path('views/components/loader.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/Loader/Component.php',
            destination: base_path('app/View/Components/Loader.php'),
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
        return "1. Add `@import 'parts/loader';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-loader/>";
    }
}
