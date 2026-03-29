<figure class="blockquote">
    @if($author)
        <figcaption class="blockquote__author">{{ $author }}</figcaption>
    @endif
    <blockquote class="blockquote__quote">
        <p>{{ $text }}</p>
    </blockquote>
</figure>
