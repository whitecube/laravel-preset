<?php

namespace Whitecube\LaravelPreset;

use \File;
use Laravel\Ui\UiCommand;

class Blade
{
    public static function install(UiCommand $command)
    {
        $command->info('Setting up blade files...');
        static::prepareFiles();
    }

    public static function prepareFiles()
    {
        File::cleanDirectory(resource_path('views'));
        File::ensureDirectoryExists('resources/views/components');
        copy(__DIR__ . '/stubs/blade/layout.blade.php', resource_path('views/components/layout.blade.php'));
    }
}
