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
     */
    public string $tag;

    /**
     * The href of the button in case the tag is `<a>`
     */
    public ?string $href;

    /**
     * The type of the button in case the tag is `<button>`
     */
    public ?string $type;

    /**
     * The icon of the button
     */
    public ?string $icon;

    /**
     * If the button is disabled or not.
     */
    public bool $disabled;

    /**
     * The view used to render the component
     */
    public ?string $view;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $href = null,
        ?string $type = null,
        ?string $icon = null,
        string $view = 'button',
        bool $disabled = false,
    ) {
        $this->href = $href;
        $this->type = $type;
        $this->icon = $icon;
        $this->view = $view;
        $this->disabled = $disabled;

        if ($this->href) {
            $this->tag = 'a';
            $this->type = null;
            $this->disabled = false;
        } else {
            $this->tag = 'button';
            $this->type = in_array($type, ['button', 'submit', 'reset']) ? $type : 'button';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.'.$this->view);
    }

    /**
     * Get the correct attributes in the attribute bag.
     */
    public function contextualizedAttributes(ComponentAttributeBag $attributes): ComponentAttributeBag
    {
        if ($this->href) {
            $attributes = $attributes->merge(['href' => $this->href]);
        }

        if ($this->disabled) {
            $attributes = $attributes->merge(['disabled' => '']);
        }

        if ($this->icon) {
            $attributes = $attributes->merge(['data-icon' => $this->icon]);
        }

        if ($this->type) {
            $attributes = $attributes->merge(['type' => $this->type]);
        }

        return $this->attributes = $attributes;
    }
}
