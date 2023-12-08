<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Whitecube\BemComponents\BemComponent;

class Button extends BemComponent
{
    /**
     * The tag used for the component.
     * Default is `<button>` but it could also be `<a>`.
     */
    public string $tag;

    /**
     * The href of the button in case the tag is `<a>`
     */
    public ?string $href;

    /**
     * The icon of the button
     */
    public ?string $icon;

    /**
     * Create a new component instance.
     */
    public function __construct(string $href = null, string $icon = null, string $tag = 'button')
    {
        $this->tag = $tag;
        $this->href = $href;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
