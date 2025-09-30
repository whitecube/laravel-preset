<?php

namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class TableView implements PublisherInterface
{
    public array $columns;
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'TableView';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/table-view/style.scss',
            destination: resource_path('sass/parts/_table-view.scss'),
        );

        $view = File::makeFromStub(
            stub: 'components/table-view/view.blade.php',
            destination: resource_path('views/components/table-view.blade.php'),
        );

        $component = File::makeFromStub(
            stub: 'components/table-view/Component.php',
            destination: base_path('app/View/Components/TableView.php'),
        );

        return FilesCollection::make([$style, $view, $component]);
    }

    /**
     * Get the component's usage instructions
     */
    public function instructions(): ?string
    {
        $this->columns = [
            "Première colonne",
            "Deuxième colonne",
            "Troisième colonne",
        ];
        return "1. Add `@import 'parts/table-view';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-table-view column-title=\"Première colonne\" columns=\"$this->columns\" link=\"#\" />`";
    }
}
