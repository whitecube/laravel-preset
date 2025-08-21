<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Whitecube\BemComponents\HasBemClasses;

class LayoutImage extends Component
{
    use HasBemClasses;

    /**
     * The LayoutImage's image.
     */
    public string $image;

    /**
     * The LayoutImage's image alt.
     */
    public string $alt;

    /**
     * The LayoutImage's caption.
     */
    public string $caption;

    /**
     * Create a new component instance.
     */
    public function __construct(string $image, string $alt, string $caption)
    {
        $this->image = $image;
        $this->alt = $alt;
        $this->caption = $caption;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout-image');
    }
}
