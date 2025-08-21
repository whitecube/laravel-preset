<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class Image implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'Image';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/image/style.scss',
            destination: resource_path('sass/parts/_layout-image.scss'),
        );

        $view = File::makeFromStub(
            stub: 'components/image/view.blade.php',
            destination: resource_path('views/components/layout-image.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/image/Component.php',
            destination: base_path('app/View/Components/LayoutImage.php'),
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
        return "1. Add `@import 'parts/layout-image';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-layout-image :image=\"asset('img/money.png')\" alt=\"the money these components will give us !!!\" caption=\"all the money !!!\" />`";
        }
}
