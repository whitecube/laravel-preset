<?php

namespace Whitecube\LaravelPreset;

use \File;
use Symfony\Component\Process\Process;

class Sass
{

    public static function install()
    {
        static::cloneRepo();
        static::removeJunk();
        static::addEntry();
        static::addBase();
    }

    public static function cloneRepo()
    {
        File::deleteDirectory(resource_path('sass'));

        $process = new Process(['git', 'clone', 'https://github.com/whitecube/white-sass.git', 'resources/sass']);
        $process->run();
    }

    public static function removeJunk()
    {
        File::delete(resource_path('sass/kaduk.png'));
        File::delete(resource_path('sass/README.md'));
        File::deleteDirectory(resource_path('sass/.git'));
    }

    public static function addEntry()
    {
        copy(__DIR__ . '/stubs/css/app.scss', resource_path('sass/app.scss'));
    }

    public static function addBase()
    {
        File::ensureDirectoryExists('resources/sass/base');

        if(!File::exists('resources/sass/base/_reset.scss')) {
            copy(__DIR__ . '/stubs/css/reset.scss', resource_path('sass/base/_reset.scss'));
        }

        if(!File::exists('resources/sass/base/_base.scss')) {
            copy(__DIR__ . '/stubs/css/base.scss', resource_path('sass/base/_base.scss'));
        }

        if(!File::exists('resources/sass/base/_typography.scss')) {
            File::put('resources/sass/base/_typography.scss', '');
        }
    }

}
