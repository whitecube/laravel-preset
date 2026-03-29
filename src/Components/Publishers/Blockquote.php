<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class Blockquote implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'Blockquote';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/blockquote/style.scss',
            destination: resource_path('sass/parts/_blockquote.scss'),
        );

        $view = File::makeFromStub(
            stub: 'components/blockquote/view.blade.php',
            destination: resource_path('views/components/blockquote.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/blockquote/Component.php',
            destination: base_path('app/View/Components/Blockquote.php'),
        );

        $layout = File::makeFromStub(
            stub: 'components/blockquote/Layout.php',
            destination: base_path('app/Layouts/Blockquote.php'),
        );

        return FilesCollection::make([
            $style,
            $view,
            $component,
            $layout
        ]);
    }

    /**
     * Get the component's usage instructions
     */
    public function instructions(): ?string
    {
        return "1. Add `@import 'parts/blockquote';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-blockquote text=\"By 2018, Partch had won awards and assembled a formidable portfolio of grants. She sat on the boards of learned societies. She’d had a second son and recruited a group of students and postdocs inspired by her vision. Priya Crosby, a recent postdoc in her lab, remembers meeting Partch at a party and feeling awed. Partch’s passion for understanding the clock was palpable, and she seemed to have every piece of data about it at her fingertips.\" author=\"Mauris pharetra turpis eget placerat fringilla\" />`";
        }
}
