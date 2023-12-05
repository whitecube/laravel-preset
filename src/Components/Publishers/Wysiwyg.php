<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

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
        $files = FilesCollection::make();

        $style = $files->append(
            stub: 'components/wysiwyg/part.scss',
            destination: resource_path('sass/parts/_wysiwyg.scss'),
        );

        $view = $files->append(
            stub: 'components/wysiwyg/view.blade.php',
            destination: resource_path('views/components/wysiwyg.blade.php'),
        );

        return $files;
    }
}