<article class="list-item">
    <h3 class="list-item__title">
        {{ $rowTitle }}
    </h3>
    <dl class="list-item__infos">
        @foreach($columns as $column)
            <dt class="list-item__info">{{ $column }}</dt>
        @endforeach
    </dl>
    <a href="{{ $link }}" class="list-item__link">Voir la ressource</a>
    <span aria-hidden="true" class="list-item__icon"></span>
</article>
