<section {{ $attributes->bem('txt-img') }}>
    <div class="wrapper">
        <div class="txt-img__container">
            <div class="txt-img__info">
                <div class="txt-img__content">
                    <h2 class="txt-img__title">{{ $title }}</h2>
                    @isset($moreHref, $moreContent)
                        <div class="txt-img__more">
                            <x-button tag="a"
                                :href="$moreHref"
                                modifiers="tiny outline icon-right"
                                icon="arrow-right"
                            >
                                {{ $moreContent }}
                            </x-button>
                        </div>
                    @endisset
                    @isset($label)
                        <p class="txt-img__label">{{ $label }}</p>
                    @endisset
                </div>
                <p class="txt-img__txt">{{ $text }}</p>
                @isset($actions)
                    <div class="txt-img__actions">
                        {{ $actions }}
                    </div>
                @endisset
            </div>
            <figure class="txt-img__fig">
                <img src="{{ $img }}" alt="{{ $alt }}" class="txt-img__img">
            </figure>
        </div>
    </div>
</section>
