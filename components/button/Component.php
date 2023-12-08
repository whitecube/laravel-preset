<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Whitecube\BemComponents\BemComponent;

class button extends BemComponent
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
     * Create a new component instance.
     */
    public function __construct(string $href = null, string $tag = 'button')
    {
        $this->tag = $tag;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
