<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * The header's title
     */
    public string $title;

    /**
     * The header's backlink href
     */
    public ?string $backHref;

    /**
     * The header's backlink content
     */
    public ?string $backContent;

    /**
     * The header's label
     */
    public ?string $label;

    /**
     * The header's text
     */
    public ?string $text;

    /**
     * The header's button href
     */
    public ?string $buttonHref;

    /**
     * The header's button modifiers
     */
    public ?string $buttonModifiers;

    /**
     * The header's button content
     */
    public ?string $buttonContent;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title,
        string $backHref = null,
        string $backContent = null,
        string $label = null,
        string $text = null,
        string $buttonHref = null,
        string $buttonModifiers = '',
        string $buttonContent = null
    ) {
        $this->title = $title;
        $this->backHref = $backHref;
        $this->backContent = $backContent;
        $this->label = $label;
        $this->text = $text;
        $this->buttonHref = $buttonHref;
        $this->buttonModifiers = $buttonModifiers;
        $this->buttonContent = $buttonContent;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
