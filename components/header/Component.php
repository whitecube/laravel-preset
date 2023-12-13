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
     * The header's background image
     */
    public ?string $backgroundImgSrc;

    /**
     * The header's background image alt
     */
    public ?string $backgroundImgAlt;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title,
        string $backHref = null,
        string $backContent = null,
        string $label = null,
        string $text = null,
        string $backgroundImgSrc = null,
        string $backgroundImgAlt = '',
    ) {
        $this->title = $title;
        $this->backHref = $backHref;
        $this->backContent = $backContent;
        $this->label = $label;
        $this->text = $text;
        $this->backgroundImgSrc = $backgroundImgSrc;
        $this->backgroundImgAlt = $backgroundImgAlt;

        if($backgroundImgSrc){
            $this->modifier('has-img');
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
