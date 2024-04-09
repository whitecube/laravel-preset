<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Whitecube\BemComponents\HasBemClasses;

class Container extends Component
{
    use HasBemClasses;

    /**
     * The title of the section
     */
    public ?string $title;

    /**
     * The columns for the grid
     */
    public ?string $cols;

    public function __construct(?string $cols = null, ?string $title = null)
    {
        $this->title = $title;
        $this->cols = $cols;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.container');
    }
}
