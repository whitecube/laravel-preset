const mix = require('laravel-mix');
require('laravel-mix-pluton');
require('mix-white-sass-icons');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

if(process.env.BUILD_ICONS) {
    return mix.icons('resources/icons', 'resources/fonts')
}

mix.pluton('resources/js/parts')
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('resources/img', 'public/img')
    .copy('resources/favicon', 'public/favicon')
    .browserSync({
        proxy: '#DOMAIN#.localhost',
        notify: false
    });
