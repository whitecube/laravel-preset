<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class Button implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'Button';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $baseStyle = File::makeFromStub(
            stub: 'components/button/style.scss',
            destination: resource_path('sass/parts/_button.scss'),
        );

        $baseView = File::makeFromStub(
            stub: 'components/button/view.blade.php',
            destination: resource_path('views/components/button.blade.php'),
        );

        $iconStyle = File::makeFromStub(
            stub: 'components/icon-button/style.scss',
            destination: resource_path('sass/parts/_icon-button.scss'),
        );

        $iconView = File::makeFromStub(
            stub: 'components/icon-button/view.blade.php',
            destination: resource_path('views/components/icon-button.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/button/Component.php',
            destination: base_path('app/View/Components/Button.php'),
        );

        return FilesCollection::make([
            $baseStyle,
            $baseView,
            $iconStyle,
            $iconView,
            $component,
        ]);
    }

    /**
     * Get the component's usage instructions
     */
    public function instructions(): ?string
    {
        return "1. Add `@import 'parts/button';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-button tag=\"a\" href=\"/example\" modifier=\"small\" icon=\"arrow-right\">Content</x-button>`.\r\nBy default the component's tag is a \"button\". If it's an `a`, it should also have an `href` attribute.\r\n3. You should add the possible icons to the \$availabl-icons variable at the beggining of the 'parts/_button.scss' file.";
    }
}
