<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Whitecube\BemComponents\HasBemClasses;

class Post extends Component
{
    use HasBemClasses;

    /**
     * The title of the post
     */
    public string $title;

    /**
     * The introductory text of the post
     * For example, a short summary or the first couple lines
     */
    public string $text;

    /**
     * Infos about the post
     * For example, the author name or the publish date
     */
    public string $infos;

    /**
     * The link to the post
     */
    public string $link;

    /**
     * The text of the "read more" link
     */
    public string $more;

    public function __construct(
        string $title,
        string $text,
        string $infos,
        string $link,
        string $more,
    ) {
        $this->title = $title;
        $this->text = $text;
        $this->infos = $infos;
        $this->link = $link;
        $this->more = $more;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post');
    }
}
