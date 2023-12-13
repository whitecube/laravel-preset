<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use Whitecube\BemComponents\HasBemClasses;

class Button extends Component
{
    use HasBemClasses;

    /**
     * The tag used for the component.
     * Default is `<button>` but it could also be `<a>`.
     */
    public string $tag;

    /**
     * The href of the button in case the tag is `<a>`
     */
    public ?string $href;

    /**
     * The icon of the button
     */
    public ?string $icon;

    /**
     * If the button is disabled or not.
     */
    public ?bool $disabled;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $href = null,
        string $icon = null,
        string $disabled = null,
        string $tag = 'button'
    ) {
        $this->tag = $tag;
        $this->href = $href;
        $this->icon = $icon;
        $this->disabled = $disabled;

        if($this->icon) {
            $this->modifiers([
                'icon',
                'icon-'.$icon
            ]);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }

    /**
     * Get the correct attributes in the attribute bag.
     */
    public function contextualizedAttributes(ComponentAttributeBag $attributes): ComponentAttributeBag
    {
        $attributes->bem('button');

        if($this->href){
            $attributes = $attributes->merge(['href' => $this->href]);
        }

        if($this->disabled){
            $attributes = $attributes->merge(['disabled' => '']);
        }

        return $attributes;
    }
}
