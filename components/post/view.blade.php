<article {{ $attributes->bem('post') }}>
    <h2 class="post__title">
        <a href="{{ $link }}" class="post__link">{{ $title }}</a>
    </h2>
    <p class="post__infos">{{ $infos }}</p>
    <p class="post__txt">{{ $text }}</p>
    <p class="post__more">{{ $more }}</p>
</article>
