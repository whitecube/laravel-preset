<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Video extends Component
{
    public string $thumb;
    public string $videoId;
    public ?string $caption = null;

    /**
     * Create a new component instance.
     */
    public function __construct(string $thumb, string $videoId, string $caption = null)
    {
        $this->thumb = $thumb;
        $this->videoId = $videoId;
        $this->caption = $caption;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.video');
    }
}
