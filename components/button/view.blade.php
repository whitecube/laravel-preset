<{{ $tag }}
	{{ isset($href) ? 'href='.$href : '' }}
	class="{{ $bem('button') }}"
>
    <span class="button__label">{{ $slot }}</span>
</{{ $tag }}>
