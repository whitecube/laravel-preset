<section {{ $attributes->bem('txt-img') }}>
    <div class="wrapper">
        <div class="txt-img__container">
            <div class="txt-img__info">
                <h2 class="txt-img__title">{{ $title }}</h2>
                <div class="txt-img__txt wysiwyg">
                    {{ $text }}
                </div>
                @if (isset($actions) && $actions->isNotEmpty())
                    <div class="txt-img__actions">
                        {{ $actions }}
                    </div>
                @endif
            </div>
            <figure class="txt-img__fig">
                <img src="{{ $img }}" alt="{{ $alt }}" class="txt-img__img">
            </figure>
        </div>
    </div>
</section>
