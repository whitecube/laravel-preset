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
     * The TxtImg more link's href.
     */
    public ?string $moreHref;

    /**
     * The TxtImg more link's content.
     */
    public ?string $moreContent;

    /**
     * The TxtImg's label.
     */
    public ?string $label;

    /**
     * The TxtImg's text.
     */
    public string $text;

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
        string $text,
        string $img,
        string $alt,
        string $moreHref = null,
        string $moreContent = null,
        string $label = null,
    ) {
        $this->title = $title;
        $this->moreHref = $moreHref;
        $this->moreContent = $moreContent;
        $this->label = $label;
        $this->text = $text;
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
