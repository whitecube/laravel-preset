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
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection;

    /**
     * Get the component's usage instructions
     */
    public function instructions(): ?string
    {
        return "1. Add `@import 'parts/faq';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-faq title=\"Example title\" text=\"Example text\" :img=\"asset('img/example.png')\" alt=\"Example alt\" label=\"Example label\" moreHref=\"#\" moreContent=\"Example more\" ><x-slot name=\"actions\"><x-button>Example button</x-button></x-slot></x-faq>`";
    }
}