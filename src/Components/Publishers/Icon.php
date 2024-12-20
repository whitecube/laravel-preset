<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class Icon implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'Icon';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/icon/style.scss',
            destination: resource_path('sass/parts/_icon.scss'),
        );

        $view = File::makeFromStub(
            stub: 'components/icon/view.blade.php',
            destination: resource_path('views/components/icon.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/icon/Component.php',
            destination: base_path('app/View/Components/Icon.php'),
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
        return "1. Add `@import 'parts/icons';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-icon icon=\"arrow\" sheet=\"default\"/>`";
    }
}
