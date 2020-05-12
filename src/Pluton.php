<?php

namespace Whitecube\LaravelPreset;

use \File;

class Pluton
{

    public static function install()
    {
        static::prepareFiles();
        static::addBabelRc();
    }

    public static function prepareFiles()
    {
        File::cleanDirectory(resource_path('js'));
        copy(__DIR__ . '/stubs/js/app.js', resource_path('js/app.js'));
        File::makeDirectory('resources/js/parts');
        copy(__DIR__.'/stubs/js/part.js', resource_path('js/parts/example.js'));
    }

    public static function addBabelRc()
    {
        copy(__DIR__.'/stubs/.babelrc', base_path('.babelrc'));
    }

}
