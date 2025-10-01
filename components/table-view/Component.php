<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Whitecube\BemComponents\HasBemClasses;

class TableView extends Component
{
    use HasBemClasses;
    /**
     * The Table Row main column text
     */
    public string $rowTitle;

    /**
     * The Table Row other columns
     */
    public array $columns;

    /**
     * The Table Row link
     */
    public string $link;

    /**
     * Create a new component instance.
     */
    public function __construct(string $rowTitle, array $columns, string $link)
    {
        $this->rowTitle = $rowTitle;
        $this->columns = $columns;
        $this->link = $link;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-view');
    }
}
