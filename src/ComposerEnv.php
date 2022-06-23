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
        static::addComposerScripts();
    }

    public static function copyStub()
    {
        File::ensureDirectoryExists('app/Console/Commands');
        copy(__DIR__ . '/stubs/ComposerEnv.stub', app_path('Console/Commands/ComposerEnv.php'));
    }

    public static function addComposerScripts()
    {
        $composer = app()->make(\Whitecube\LaravelPreset\Support\Composer::class);

        $composer->run([
            'config',
            'scripts.pre-install-cmd',
            'App\\Console\\Commands\\ComposerEnv::loadLocalRepositories'
        ]);

        $composer->run([
            'config',
            'scripts.pre-update-cmd',
            'App\\Console\\Commands\\ComposerEnv::loadLocalRepositories'
        ]);

        $composer->run([
            'config',
            'scripts.fix-style',
            './vendor/bin/pint --preset laravel'
        ]);
    }
}
