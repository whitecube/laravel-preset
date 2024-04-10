<div class="lightbox" id="{{ $name }}">
    <div class="lightbox__header">
        @isset($header)
            {{ $header }}
        @endisset
        <a href="#" class="lightbox__close">Fermer</a>
    </div>
    <div class="lightbox__container">
        @isset($content)
            {{ $content }}
        @endisset
    </div>
</div>
