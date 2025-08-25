<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Whitecube\BemComponents\HasBemClasses;

class Blockquote extends Component
{
    use HasBemClasses;

    /**
     * The blockquote's text.
     */
    public string $text;

    /**
     * The blockquote's author.
     */
    public ?string $author = null;

    /**
     * Create a new component instance.
     */
    public function __construct(string $text, string $author = null)
    {
        $this->text = $text;
        $this->author = $author;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blockquote');
    }
}
