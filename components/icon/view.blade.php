<svg class="icon">
    <use xlink:href="{{ asset('build/assets/'.$sheet.'.svg').'?'.filemtime(public_path('build/assets/'.$sheet.'.svg')).'#sprite-'.$icon }}"></use>
</svg>
