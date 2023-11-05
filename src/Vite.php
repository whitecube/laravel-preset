<?php

namespace Whitecube\LaravelPreset;

use \File;
use Laravel\Ui\UiCommand;

class Vite
{

    public static function install(UiCommand $command)
    {
        $command->info('Setting up vite...');
        static::copyConfigFile();
    }

    public static function copyConfigFile()
    {
        copy(__DIR__.'/stubs/vite.config.js', base_path('vite.config.js'));
    }
}
