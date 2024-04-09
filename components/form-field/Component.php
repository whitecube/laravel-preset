<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Whitecube\BemComponents\HasBemClasses;

class FormField extends Component
{
    use HasBemClasses;

    /**
     * The for attribute of the label
     */
    public string $for;

    /**
     * The label for the input
     */
    public string $label;

    /**
     * The text to tell the input is optional
     */
    public ?string $optional;

    /**
     * The helper text for the input
     */
    public ?string $helper;

    /**
     * The icon for the input
     */
    public ?string $icon;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $for,
        string $label,
        ?string $optional = null,
        ?string $helper = null,
        ?string $icon = null,
    ) {
        $this->for = $for;
        $this->label = $label;
        $this->optional = $optional;
        $this->helper = $helper;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-field');
    }
}
