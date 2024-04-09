<header {{ $attributes->bem('header') }}>
    <div class="wrapper">
        <div class="header__container">
            <h1 class="header__title">{{ $title }}</h1>
            @if (isset($text) && $text->isNotEmpty())
                <div class="header__txt wysiwyg {{ isset($background) ? 'wysiwyg--contrast' : '' }}">
                    {{ $text }}
                </div>
            @endif
            @if (isset($actions) && $actions->isNotEmpty())
                <div class="header__actions">
                    {{ $actions }}
                </div>
            @endif
        </div>
    </div>
    @isset($background)
        <div class="header__background"
            style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{ $background }})"
            aria-hidden="true"></div>
    @endisset
</header>
