<header {{ $attributes->bem('header') }}>
    <div class="wrapper">
        <div class="header__container">
            <h1 class="header__title">{{ $title }}</h1>
            @isset($backHref, $backContent)
                <a href="{{ $backHref }}"
                    class="header__link"
                >
                    {{ $backContent }}
                </a>
            @endisset
            @isset($label)
                <p class="header__label">{{ $label}}</p>
            @endisset
            @isset($text)
                <p class="header__txt">{{ $text }}</p>
            @endisset
            @isset($actions)
                <div class="header__actions">
                    {{ $actions }}
                </div>
            @endisset
        </div>
    </div>
    @isset($backgroundImgSrc)
        <div class="header__background">
            <img src="{{ $backgroundImgSrc }}" alt="{{ $backgroundImgAlt }}" class="header__img">
            <div class="header__overlay"></div>
        </div>
    @endisset
</header>
