<{{ $tag }}
	{{ isset($href) ? 'href='.$href : '' }}
	class="{{ $bem('button') }}{{ isset($icon) ? ' button--icon button--icon-'.$icon : '' }}"
>
    <span class="button__label">{{ $slot }}</span>
</{{ $tag }}>
