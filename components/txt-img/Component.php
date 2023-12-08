<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Whitecube\BemComponents\BemComponent;

class TxtImg extends BemComponent
{
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

    /*
     * The TxtImg's button href.
     */
    public ?string $buttonHref;

    /*
     * The TxtImg's button modifiers.
     */
    public ?string $buttonModifiers;

    /**
     * The TxtImg's button content.
     */
    public ?string $buttonContent;

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
        string $moreHref = null,
        string $moreContent = null,
        string $label = null,
        string $text,
        string $buttonHref = null,
        string $buttonModifiers = null,
        string $buttonContent = null,
        string $img,
        string $alt,
    ) {
        $this->title = $title;
        $this->moreHref = $moreHref;
        $this->moreContent = $moreContent;
        $this->label = $label;
        $this->text = $text;
        $this->buttonHref = $buttonHref;
        $this->buttonModifiers = $buttonModifiers;
        $this->buttonContent = $buttonContent;
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
