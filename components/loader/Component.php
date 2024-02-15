<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use Whitecube\BemComponents\HasBemClasses;

class Loader extends Component
{
    use HasBemClasses;

     /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.loader');
    }
}
