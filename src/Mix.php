<?php

namespace Whitecube\LaravelPreset;

use \File;

class Mix
{

    public static function install()
    {
        static::copyFile();
        static::setBrowserSyncDomain();
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

}