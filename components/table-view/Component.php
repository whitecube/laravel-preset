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
    public string $column_title;

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
    public function __construct(string $column_title, array $columns, string $link)
    {
        $this->column_title = $column_title;
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
