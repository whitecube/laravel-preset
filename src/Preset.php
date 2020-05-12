<?php

namespace Whitecube\LaravelPreset;

use \Arr;
use \File;
use Symfony\Component\Process\Process;
use Laravel\Ui\Presets\Preset as LaravelPreset;

class Preset extends LaravelPreset
{
    public static function install()
    {
        static::updatePackages();
        Mix::install();
        Pluton::install();
        Sass::install();
    }

    public static function updatePackageArray($packages)
    {
        return array_merge(
            [
                'laravel-mix-pluton' => '^1.0.4',
                '@babel/plugin-proposal-class-properties' => '^7.8.3',
                '@babel/plugin-proposal-nullish-coalescing-operator' => '^7.8.3',
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
