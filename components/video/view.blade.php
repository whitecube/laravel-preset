<div class="video" data-video-id={{ $videoId }}>
    <div class="video__container">
        <div class="video__overlay-container">
            <div class="video__overlay" style="background-image: url({{ $image }})">
                <x-button icon="play" view="icon-button">Click me</x-button>
            </div>
        </div>
        <div class="video__iframe-container">
            <div class="video__iframe" id="player"></div>
        </div>
    </div>
    @if($caption)
        <p class="video__caption">{{ $caption }}</p>
    @endif
</div>
