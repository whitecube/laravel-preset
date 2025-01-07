<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ trim(($title ?? '').' · '.env('APP_NAME'), ' ·') }}</title>

        {!! $metas !!}

        @env('staging')
            <meta name="robots" content="noindex,nofollow">
        @endenv

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
