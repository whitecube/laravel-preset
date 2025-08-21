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

class Video extends BaseLayout
{
    /**
     * The label of the layout
     */
    public function label(): string
    {
        return 'Video';
    }

    public function view(): string
    {
        return 'video';
    }

    /**
     * The list of steps to display in the form
     */
    public function form(Baggage $bag): array
    {
        return [
            Step::make(static::label(), 'edit_video_layout')
                ->fields([
                    HikerImage::make('Cover image', 'image')
                        ->rules('required')
                        ->disk('public'),

                    Text::make('YouTube identifier', 'videoId')
                        ->rules('required')
                        ->help('The YouTube identifier is the set of characters following the "watch?v=" in the video url. Ex: in the link https://www.youtube.com/watch?v=A6AxD9bUk1o, the identifier is A6AxD9bUk1o.'),

                    Text::make('Caption', 'caption')
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
                ->row('YouTube identifier', TextComponent::make($this->videoId))
                ->row('Image', ImageComponent::make(Storage::url($this->image))->aspectRatio('16/9'))
                ->row('Caption', TextComponent::make($this->caption))
                ->row('Alternative text', TextComponent::make($this->alt)),
        ];
    }

    /**
     * Extract the values from the bag to store them in the database.
     */
    public function fillAttributes(Baggage $bag): array
    {
        return $bag->only(['image', 'alt', 'caption', 'videoId']);
    }
}
