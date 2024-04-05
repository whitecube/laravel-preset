<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class FormField implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'Form field';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/form-field/style.scss',
            destination: resource_path('sass/parts/_form-field.scss'),
        );

        $view = File::makeFromStub(
            stub: 'components/form-field/view.blade.php',
            destination: resource_path('views/components/form-field.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/form-field/Component.php',
            destination: base_path('app/View/Components/FormField.php'),
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
        return "1. Add `@import 'parts/form-field';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-form-field for=\"email\" label=\"Email\" helper=\"Votre adress email\">{{--Your input--}}</x-form-field>`";
    }
}
