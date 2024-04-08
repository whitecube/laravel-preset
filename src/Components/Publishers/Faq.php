<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class Faq implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'Faq';
    }

/**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/faq/style.scss',
            destination: resource_path('sass/parts/_faq.scss'),
        );

        $js = File::makeFromStub(
            stub: 'components/faq/js.js',
            destination: resource_path('js/parts/faq.js'),
        );

        $view = File::makeFromStub(
            stub: 'components/faq/view.blade.php',
            destination: resource_path('views/components/faq.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/faq/Component.php',
            destination: base_path('app/View/Components/Faq.php'),
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
        return "1. Add `@import 'parts/faq';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-faq :\$items />`";
    }
}
