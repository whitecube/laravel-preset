<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class Post implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'Post';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/post/part.scss',
            destination: resource_path('sass/parts/_post.scss'),
        );

        $view = File::makeFromStub(
            stub: 'components/post/view.blade.php',
            destination: resource_path('views/components/post.blade.php'),
        );

        return FilesCollection::make([$style, $view]);
    }

    /**
     * Get the component's usage instructions
     */
    public function instructions(): ?string
    {
        return "1. Add `@import 'parts/post';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-post><p>Some content</p></x-post>`";
    }
}