<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
    /**
     * The name of the icon file without extension
     */
    public string $icon;

    /**
     * The name of the spritesheet as defined in `vite.config.js`
     */
    public ?string $sheet;

    /**
     * Create a new component instance.
     */
    public function __construct(string $icon, ?string $sheet = 'default')
    {
        $this->icon = $icon;
        $this->sheet = $sheet;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icon');
    }
}
