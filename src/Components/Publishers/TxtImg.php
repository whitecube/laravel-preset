<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class TxtImg implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'Text-image section';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/txt-img/style.scss',
            destination: resource_path('sass/parts/_txt-img.scss'),
        );

        $view = File::makeFromStub(
            stub: 'components/txt-img/view.blade.php',
            destination: resource_path('views/components/txt-img.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/txt-img/Component.php',
            destination: base_path('app/View/Components/TxtImg.php'),
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
        return null;
    }
}
