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
     * Get the component's usage instructions
     */
    public function instructions(): ?string
    {
        return "1. Add `@import 'parts/faq';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-faq tag=\"a\" href=\"/example\" modifier=\"small\" icon=\"arrow-right\">Content</x-faq>`.\r\nBy default the component's tag is a \"faq\". If it's an `a`, it should also have an `href` attribute.\r\n3. You should add the possible icons to the \$availabl-icons variable at the beggining of the 'parts/_faq.scss' file.";
    }
}
