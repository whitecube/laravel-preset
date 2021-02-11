<?php

namespace Whitecube\LaravelPreset;

use \Arr;
use Laravel\Ui\UiCommand;
use Laravel\Ui\Presets\Preset as LaravelPreset;

class Preset extends LaravelPreset
{
    public static function install(UiCommand $command)
    {
        static::updatePackages($command);
        Codestyle::install($command);
        Gitignore::install($command);
        Mix::install($command);
        Pluton::install($command);
        Sass::install($command);
        Assets::install($command);
        Storage::install($command);
        Pest::install($command);

        $command->info('Installing NPM packages...');
        shell_exec('yarn');
    }

    public static function updatePackageArray($packages)
    {
        return array_merge(
            [
                'laravel-mix-pluton' => '^1.0.4',
                'whitecube-pluton' => '1.0.2',
                'mix-white-sass-icons' => '^0.0.6',
                '@babel/core' => '^7.0.0',
                '@babel/plugin-proposal-class-properties' => '^7.8.3',
                '@babel/plugin-proposal-nullish-coalescing-operator' => '^7.8.3',
                'vue-template-compiler' => '^2.6.10',
                'browser-sync' => '^2.26.7',
                'browser-sync-webpack-plugin' => '^2.0.1',
                'sass-loader' => '^8.0',
                'sass' => '^1.27',
                'fontellizr' => 'voidgraphics/fontellizr',
            ],
            Arr::except($packages, [
                'vue',
                'popper.js',
                'lodash',
                'jquery',
                'bootstrap'
            ])
        );
    }
}
