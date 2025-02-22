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
        static::installTestingPackages($command);
        static::copyStub();
    }

    public static function installProductionPackages(UiCommand $command)
    {
        $command->info('Installing the following "require" packages:');

        $packages = [
            'spatie/laravel-log-dumper',
            'whitecube/laravel-sluggable',
            'whitecube/laravel-timezones'
        ];

        $command->info(implode(', ', $packages));

        static::$composer->run([
            'require',
            ...$packages,
            '--sort-packages',
            '--no-interaction'
        ]);
    }

    public static function installDevelopmentPackages(UiCommand $command)
    {
        $command->info('Installing the following "require-dev" packages:');

        $packages = [
            'barryvdh/laravel-debugbar',
            'laravel/pint',
            'spatie/laravel-ray',
        ];

        $command->info(implode(', ', $packages));

        static::$composer->run([
            'require',
            ...$packages,
            '--dev',
            '--sort-packages',
            '--no-interaction'
        ]);
    }

    public static function installTestingPackages(UiCommand $command)
    {
        $command->info('Installing Testing Framework "PestPHP" and its Laravel plugin...');

        // Pest requires phpunit/phpunit to be removed.
        // We'll remove it both from the `require` and `require-dev` sections:
        static::$composer->run([
            'remove',
            'phpunit/phpunit',
            '--no-interaction'
        ]);
        static::$composer->run([
            'remove',
            'phpunit/phpunit',
            '--dev',
            '--no-interaction'
        ]);

        // Install Pest
        static::$composer->run([
            'require',
            'pestphp/pest',
            '--dev',
            '--with-all-dependencies',
            '--sort-packages',
            '--no-interaction'
        ]);
        static::$composer->run([
            'require',
            'pestphp/pest-plugin-laravel',
            '--dev',
            '--sort-packages',
            '--no-interaction'
        ]);
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
