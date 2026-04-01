<div {{ $attributes->bem('layout-image') }}>
    <figure class="layout-image__fig">
        <img class="layout-image__img" src="{{ $image }}" alt="{{ $alt }}">

        @if($caption)
            <figcaption class="layout-image__caption">{{ $caption }}</figcaption>
        @endif
    </figure>
</div>
