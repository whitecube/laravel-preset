<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class Wysiwyg implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'WYSIWYG';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/wysiwyg/style.scss',
            destination: resource_path('sass/parts/_layout-wysiwyg.scss'),
        );

        $view = File::makeFromStub(
            stub: 'components/wysiwyg/view.blade.php',
            destination: resource_path('views/components/layout-wysiwyg.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/wysiwyg/Component.php',
            destination: base_path('app/View/Components/Wysiwyg.php'),
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
        return "1. Add `@import 'parts/layout-wysiwyg';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-layout-wysiwyg><p>Some content</p></x-layout-wysiwyg>`";
    }
}
