<section class="{{ $bem('txt-img') }}">
    <div class="wrapper">
        <div class="txt-img__container">
            <div class="txt-img__info">
                <div class="txt-img__content">
                    <h2 class="txt-img__title">{{ $title }}</h2>
                        <x-button tag="a"
                            :href="$moreHref"
                             modifiers="tiny outline icon-right"
                            icon="arrow-right"
                        >
                            {{ $moreContent }}
                        </x-button>
                    <p class="txt-img__label">{{ $label }}</p>
                </div>
                <p class="txt-img__txt">{{ $text }}</p>
                <x-button tag="a" :href="$buttonHref" :modifiers="$buttonModifiers">{{ $buttonContent }}</x-button>
            </div>
            <figure class="txt-img__fig">
                <img src="{{ $img }}" alt="{{ $alt }}" class="txt-img__img">
            </figure>
        </div>
    </div>
</section>
