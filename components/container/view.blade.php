<{{ isset($title) ? 'section' : 'div' }} {{ $attributes->bem('container') }}>
    @isset($title)
        <h2 class="container__title sro">{{ $title }}</h2>
    @endisset
    <div class="container__content"
        @isset($cols) data-cols="{{ $cols }}" @endisset
    >
        {{ $slot }}
    </div>
</section>
