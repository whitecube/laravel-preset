<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class Badge implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'Badge';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/badge/part.scss',
            destination: resource_path('sass/parts/_badge.scss'),
        );

        $view = File::makeFromStub(
            stub: 'components/badge/view.blade.php',
            destination: resource_path('views/components/badge.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/badge/Comonent.php',
            destination: resource_path('app/View/Components/Badge.php'),
        );

        return FilesCollection::make([$style, $view, $component]);
    }

    /**
     * Get the component's usage instructions
     */
    public function instructions(): ?string
    {
        return "1. Add `@import 'parts/badge';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-badge><p>Some content</p></x-badge>`";
    }
}
