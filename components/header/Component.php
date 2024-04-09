<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Whitecube\BemComponents\HasBemClasses;

class Header extends Component
{
    use HasBemClasses;

    /**
     * The header's title
     */
    public string $title;

    /**
     * The header's background image
     */
    public ?string $background;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title,
        ?string $background = null,
    ) {
        $this->title = $title;
        $this->background = $background;

        if ($background) {
            $this->modifier('img');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
