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
        return 'Header';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/header/style.scss',
            destination: resource_path('sass/parts/_header.scss'),
        );

        $view = File::makeFromStub(
            stub: 'components/header/view.blade.php',
            destination: resource_path('views/components/header.blade.php'),
        );

        $class = File::makeFromStub(
            stub: 'components/header/class.blade.php',
            destination: base_path('app/View/Components/header.php'),
        );

        return FilesCollection::make([
            $style,
            $view,
            $class,
        ]);
    }

    /**
     * Get the component's usage instructions
     */
    public function instructions(): ?string
    {
        return "1. Add `@import 'parts/header';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-header title=\"Example title\" backHref=\"/example\" backContent=\"Retour\" label=\"Example label\" buttonContent=\"Example button\" buttonHref=\"/example\" buttonModifiers=\"small\" text=\"An example text that's a little longer than the title\"/>`";
    }
}
