<aside id="{{ $name }}" {{ $attributes->bem('sidebar') }}>
    <div class="sidebar__container">
        <a href="#" class="sidebar__close"></a>
        {{ $slot }}
    </div>
</aside>
