<section {{ $attributes->bem('txt-img') }}>
    <div class="wrapper">
        <div class="txt-img__container">
            <div class="txt-img__info">
                <div class="txt-img__content">
                    <h2 class="txt-img__title">{{ $title }}</h2>
                    @if(isset($headlink) && $headlink->isNotEmpty())
                        <div class="txt-img__headlink">
                            {{ $headlink }}
                        </div>
                    @endif
                    @if(isset($label) && $label->isNotEmpty())
                        <p class="txt-img__label">{{ $label }}</p>
                    @endif
                </div>
                <div class="txt-img__txt wysiwyg">
                    {{ $text }}
                </div>
                @if(isset($actions) && $actions->isNotEmpty())
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
