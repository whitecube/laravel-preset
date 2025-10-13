<div class="filter__container">
    <{{ $tag }} {{ $contextualizedAttributes($attributes)->bem('filter__button') }}>
        @if ($count)
            <span class="filter__button__count">{{ $count }}</span>
        @endif
        <span class="button__label">{{ $label }}</span>
    </{{ $tag }}>
    <div class="filter__menu">
        {{ $slot }}
    </div>
</div>
