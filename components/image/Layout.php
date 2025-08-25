<?php

namespace App\Layouts;

use Hiker\Cms\Layouts\BaseLayout;
use Hiker\Components\DataList\DataList;
use Hiker\Components\Editor\Step;
use Hiker\Components\Fields\Image\Image as HikerImage;
use Hiker\Components\Fields\Text\Text;
use Hiker\Components\Image\Image as ImageComponent;
use Hiker\Components\Text\Text as TextComponent;
use Hiker\Tracks\Baggage;
use Illuminate\Support\Facades\Storage;

class Image extends BaseLayout
{
    /**
     * The label of the layout
     */
    public function label(): string
    {
        return 'Image';
    }

    public function view(): string
    {
        return 'image';
    }

    /**
     * The list of steps to display in the form
     */
    public function form(Baggage $bag): array
    {
        return [
            Step::make(static::label(), 'edit_image_layout')
                ->fields([
                    HikerImage::make('Image', 'image')
                        ->rules('required')
                        ->disk('public'),

                    Text::make('Alternative text', 'alt')
                        ->rules('required')
                        ->help('<strong>Hidden</strong>. An alternative text is used to give a description of the content of an image so that the visually impaired and search engines can understand the image.'),

                    Text::make('Caption', 'caption')
                        ->rules('required'),
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
                ->row('Image', ImageComponent::make(Storage::url($this->image))->aspectRatio('16/9'))
                ->row('Alternative text', TextComponent::make($this->alt))
                ->row('Caption', TextComponent::make($this->caption)),
        ];
    }

    /**
     * Extract the values from the bag to store them in the database.
     */
    public function fillAttributes(Baggage $bag): array
    {
        return $bag->only(['image', 'alt', 'caption']);
    }
}
