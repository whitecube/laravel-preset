<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Whitecube\BemComponents\HasBemClasses;

class Faq extends Component
{
    use HasBemClasses;

    /**
     * The list of all questions.
     *
     * An item should look like this:
     * 'item' => [
     *     'question' => '...',
     *     'answer' => '...',
     * ]
     */
    public array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.faq');
    }
}
