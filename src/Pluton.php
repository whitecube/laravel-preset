<?php

namespace Whitecube\LaravelPreset;

use \File;
use Laravel\Ui\UiCommand;

class Pluton
{

    public static function install(UiCommand $command)
    {
        $command->info('Installing pluton...');
        static::prepareFiles();
        static::addBabelRc();
    }

    public static function prepareFiles()
    {
        File::cleanDirectory(resource_path('js'));
        copy(__DIR__ . '/stubs/js/app.js', resource_path('js/app.js'));
        File::ensureDirectoryExists('resources/js/parts');
        copy(__DIR__.'/stubs/js/part.js', resource_path('js/parts/example.js'));
    }

    public static function addBabelRc()
    {
        copy(__DIR__.'/stubs/.babelrc', base_path('.babelrc'));
    }

}
