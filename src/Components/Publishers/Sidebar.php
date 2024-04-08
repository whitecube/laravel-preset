<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class Sidebar implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'Sidebar';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/sidebar/style.scss',
            destination: resource_path('sass/parts/_sidebar.scss'),
        );

        $js = File::makeFromStub(
            stub: 'components/sidebar/js.js',
            destination: resource_path('js/parts/sidebar.js'),
        );

        $view = File::makeFromStub(
            stub: 'components/sidebar/view.blade.php',
            destination: resource_path('views/components/sidebar.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/sidebar/Component.php',
            destination: base_path('app/View/Components/Sidebar.php'),
        );

        return FilesCollection::make([
            $style,
            $js,
            $view,
            $component,
        ]);
    }

    /**
     * Get the component's usage instructions
     */
    public function instructions(): ?string
    {
        return "1. Add `@import 'parts/sidebar';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-button tag=\"a\" href=\"#sidebar-1\" data-sidebar=\"sidebar-1\">Open sidebar</x-button> <x-sidebar title=\"Sidebar\" name=\"sidebar-1\"></x-sidebar>`";
    }
}
