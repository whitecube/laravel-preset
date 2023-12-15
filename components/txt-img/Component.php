<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Whitecube\BemComponents\HasBemClasses;

class TxtImg extends Component
{
    use HasBemClasses;

    /**
     * The TxtImg's title.
     */
    public string $title;

    /**
     * The TxtImg's image.
     */
    public string $img;

    /**
     * The TxtImg's image alt.
     */
    public string $alt;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title,
        string $img,
        string $alt,
    ) {
        $this->title = $title;
        $this->img = $img;
        $this->alt = $alt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.txt-img');
    }
}
