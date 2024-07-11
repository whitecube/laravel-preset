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
        static::addLintStaged();
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
        static::updateScripts();
        \File::makeDirectory(base_path('.husky'));
        shell_exec('echo "yarn lint-staged" > .husky/pre-commit');
        shell_exec('yarn run postinstall');
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
                'blade-formatter' => '^1.41.1',
                'husky' => '^9.0.11',
                'lint-staged' => '^15.2.7',
                'prettier' => '^3.3.2',
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

    public static function addLintStaged()
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages['lint-staged'] = [
            '*.php' => 'vendor/bin/pint',
            '*.blade.php' => 'blade-formatter -w',
            '*.{js,scss,json}' => 'prettier --write'
        ];

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }

    public static function updateScripts()
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages['scripts'] = array_merge(
            array_key_exists('scripts', $packages) ? $packages['scripts'] : [],
            ['postinstall' => 'husky']
        );

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }
}
