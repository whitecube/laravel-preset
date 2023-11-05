<?php

namespace Whitecube\LaravelPreset;

use \Arr;
use Laravel\Ui\UiCommand;
use Laravel\Ui\Presets\Preset as LaravelPreset;

class Preset extends LaravelPreset
{
    public static function install(UiCommand $command)
    {
        static::updatePackages();
        static::addComposerScripts();
        Codestyle::install($command);
        Gitignore::install($command);
        Vite::install($command);
        Pluton::install($command);
        Sass::install($command);
        Assets::install($command);
        Storage::install($command);
        Composer::install($command);
        Pest::install($command);

        $command->info('Installing NPM packages...');
        shell_exec('yarn');
    }

    public static function updatePackageArray($packages)
    {
        return array_merge(
            [
                // 'laravel-mix-pluton' => '^1.0.5',
                '@whitecube/pluton' => 'dev-vite',
                // 'mix-white-sass-icons' => '^0.2.0',
                // '@babel/core' => '^7.0.0',
                // '@babel/plugin-proposal-class-properties' => '^7.8.3',
                // '@babel/plugin-proposal-nullish-coalescing-operator' => '^7.8.3',
                // 'vue-template-compiler' => '^2.6.10',
                // 'browser-sync' => '^2.26.7',
                // 'browser-sync-webpack-plugin' => '^2.0.1',
                // 'sass-loader' => '^8.0',
                'sass' => '^1.69',
                // 'fontellizr' => 'voidgraphics/fontellizr',
            ],
            Arr::except($packages, [
                // 'vue',
                // 'popper.js',
                // 'lodash',
                // 'jquery',
                // 'bootstrap'
            ])
        );
    }

    public static function addComposerScripts()
    {
        $composer = app()->make(\Whitecube\LaravelPreset\Support\Composer::class);

        $composer->run([
            'config',
            'scripts.pre-install-cmd',
            'App\\Console\\Commands\\ComposerEnv::loadLocalRepositories',
            'git config core.hooksPath .githooks'
        ]);

        $composer->run([
            'config',
            'scripts.pre-update-cmd',
            'App\\Console\\Commands\\ComposerEnv::loadLocalRepositories',
            'git config core.hooksPath .githooks'
        ]);
    }
}
