<?php

namespace Whitecube\LaravelPreset;

use \File;
use Laravel\Ui\UiCommand;

class ComposerEnv
{
    public static function install(UiCommand $command)
    {
        $command->info('Installing composer env...');
        static::copyStub();
    }

    public static function copyStub()
    {
        File::ensureDirectoryExists('app/Console/Commands');
        copy(__DIR__ . '/stubs/ComposerEnv.stub', app_path('Console/Commands/ComposerEnv.php'));
    }
}
