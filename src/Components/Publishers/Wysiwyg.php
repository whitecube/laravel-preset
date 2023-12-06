<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;
use function Laravel\Prompts\text;

class Wysiwyg implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'WYSIWYG content';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $bemBase = text(
            label: 'Which BEM "base" CSS class should be used?',
            default: 'wysiwyg',
        );

        $style = File::makeFromStub(
                stub: 'components/wysiwyg/part.scss',
                destination: resource_path('sass/parts/_wysiwyg.scss'),
            )
            ->replaceVariableValue('wysiwyg_foo_variable', '"'.str_replace('"', '\"', text(
                label: 'Which should be the :before value?',
                placeholder: 'Say hello!',
            )).'"')
            ->replaceBemBase('wysiwyg', $bemBase);

        $view = File::makeFromStub(
                stub: 'components/wysiwyg/view.blade.php',
                destination: resource_path('views/components/wysiwyg.blade.php'),
            )
            ->replaceBemBase('wysiwyg', $bemBase);

        return FilesCollection::make([
            $style,
            $view,
        ]);
    }

    /**
     * Get the component's usage instructions
     */
    public function instructions(): ?string
    {
        return "1. Add `@import 'parts/wysiwyg';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-wysiwyg><p>Some content</p></x-wysiwyg>`";
    }
}
