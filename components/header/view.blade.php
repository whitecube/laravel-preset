<header class="header">
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
            @isset($buttonHref, $buttonContent)
                <x-button tag="a"
                    href="{{ $buttonHref }}"
                    modifiers="{{ $buttonModifiers }}"
                >
                    {{ $buttonContent }}
                </x-button>
            @endisset
        </div>
    </div>
</header>
