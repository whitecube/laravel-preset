<article class="list-item">
    <h3 class="list-item__title">
        {{ $ColumnTitle }}
    </h3>
    <dl class="list-item__infos">
        @foreach($columns as $column)
            <dt class="list-item__info">{{ $column }}</dt>
        @endforeach
    </dl>
</article>
