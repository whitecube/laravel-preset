<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class Video implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'Video';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/video/style.scss',
            destination: resource_path('sass/parts/_video.scss'),
        );

        $js = File::makeFromStub(
            stub: 'components/video/js.js',
            destination: resource_path('js/parts/video.js'),
        );
        $view = File::makeFromStub(
            stub: 'components/video/view.blade.php',
            destination: resource_path('views/components/video.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/video/Component.php',
            destination: base_path('app/View/Components/Video.php'),
        );

        $layout = File::makeFromStub(
            stub: 'components/video/Layout.php',
            destination: base_path('app/Layout/Video.php'),
        );

        return FilesCollection::make([
            $style,
            $js,
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
        return "1. Add `@import 'parts/video';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-video videoId=\"A6AxD9bUk1o\" :image=\"asset('img/money.png')\" caption=\"the money these components will give us !!!\" />`";
    }
}
