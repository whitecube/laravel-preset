<?php

namespace Whitecube\LaravelPreset;

use \File;
use Laravel\Ui\UiCommand;

class Composer
{
    protected static $composer;

    public static function install(UiCommand $command)
    {
        $command->info('Installing composer packages & scripts...');

        static::$composer = app()->make(\Whitecube\LaravelPreset\Support\Composer::class);

        static::installPackages($command);
        static::copyStub();
        static::addComposerScripts();
    }

    public static function installPackages()
    {
        $packages = [
            'barryvdh/laravel-debugbar',
            'pestphp/pest-plugin-laravel',
            'laravel/pint',
            'spatie/laravel-log-dumper',
            'spatie/laravel-ray'
        ];

        foreach ($packages as $package) {
            $command->info('Installing '.$package);
            static::$composer->run(['require', $package]);
        }
    }

    public static function copyStub()
    {
        File::ensureDirectoryExists('app/Console/Commands');
        copy(__DIR__ . '/stubs/ComposerEnv.stub', app_path('Console/Commands/ComposerEnv.php'));
    }

    public static function addComposerScripts()
    {
        static::$composer->run([
            'config',
            'scripts.pre-install-cmd',
            'App\\Console\\Commands\\ComposerEnv::loadLocalRepositories'
        ]);

        static::$composer->run([
            'config',
            'scripts.pre-update-cmd',
            'App\\Console\\Commands\\ComposerEnv::loadLocalRepositories'
        ]);

        static::$composer->run([
            'config',
            'scripts.fix-style',
            './vendor/bin/pint --preset laravel'
        ]);
    }
}
