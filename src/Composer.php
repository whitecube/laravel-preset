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

        static::installProductionPackages($command);
        static::installDevelopmentPackages($command);
        static::copyStub();
    }

    public static function installProductionPackages()
    {
        $packages = [
            'spatie/laravel-log-dumper',
            'whitecube/laravel-sluggable'
        ];

        static::$composer->run(['require', ...$packages]);
    }

    public static function installDevelopmentPackages()
    {
        // Install regular dev packages:
        $packages = [
            'barryvdh/laravel-debugbar',
            'laravel/pint',
            'spatie/laravel-ray',
        ];

        static::$composer->run(['require', ...$packages, '--dev']);

        // Pest requires phpunit/phpunit to be removed
        static::$composer->run(['remove', 'phpunit/phpunit']);
        static::$composer->run(['remove', 'phpunit/phpunit', '--dev']);

        // Install Pest
        static::$composer->run(['require', 'pestphp/pest', '--dev', '--with-all-dependencies']);
        static::$composer->run(['require', 'pestphp/pest-plugin-laravel', '--dev']);
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
