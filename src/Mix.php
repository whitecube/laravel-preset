<?php

namespace Whitecube\LaravelPreset;

use \File;

class Mix
{

    public static function install()
    {
        static::copyFile();
        static::setBrowserSyncDomain();
        static::addNpmScripts();
    }

    public static function copyFile()
    {
        copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    public static function setBrowserSyncDomain()
    {
        $mix = File::get(base_path() . '/webpack.mix.js');
        $mix = str_replace('#DOMAIN#', basename(base_path()), $mix);
        File::put(base_path() . '/webpack.mix.js', $mix);
    }

    public static function addNpmScripts()
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages['scripts'] = static::updateNpmScripts(
            array_key_exists('scripts', $packages) ? $packages['scripts'] : []
        );

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }

    public static function updateNpmScripts($scripts)
    {
        return array_merge($scripts, [
            'icons' => 'BUILD_ICONS=true yarn dev',
            'watch-icons' => 'BUILD_ICONS=true yarn watch',
        ]);
    }

}
