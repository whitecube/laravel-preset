<?php

namespace App\Layouts\CMS;

use Hiker\Cms\Layouts\BaseLayout;
use Hiker\Components\DataList\DataList;
use Hiker\Components\Editor\Step;
use Hiker\Components\Fields\Text\Text;
use Hiker\Components\Fields\Textarea\Textarea;
use Hiker\Components\Text\Text as TextComponent;
use Hiker\Tracks\Baggage;

class Blockquote extends BaseLayout
{
    /**
     * The label of the layout
     */
    public function label(): string
    {
        return 'Blockquote';
    }

    public function view(): string
    {
        return 'blockquote';
    }

    /**
     * The list of steps to display in the form
     */
    public function form(Baggage $bag): array
    {
        return [
            Step::make(static::label(), 'edit_blockquote_layout')
                ->fields([
                    Textarea::make('Text', 'text')
                        ->rules('required'),

                    Text::make('Author', 'author')
                        ->help('Optionnal.'),
                ]),
        ];
    }

    /**
     * The layout's display components
     */
    public function display(): array
    {
        return [
            DataList::make()
                ->row('Text', TextComponent::make($this->text))
                ->row('Author', TextComponent::make($this->author)),
        ];
    }

    /**
     * Extract the values from the bag to store them in the database.
     */
    public function fillAttributes(Baggage $bag): array
    {
        return $bag->only(['text', 'author']);
    }
}
