<?php

namespace Whitecube\LaravelPreset;

use Illuminate\Support\Facades\File;
use Laravel\Ui\UiCommand;

class Codestyle
{

    public static function install(UiCommand $command)
    {
        $command->info('Installing code style fixer...');

        static::copyStubs();
        static::addComposerScripts();
    }

    public static function copyStubs()
    {
        copy(__DIR__.'/stubs/pint.json', base_path('pint.json'));

        File::ensureDirectoryExists('.githooks');
        copy(__DIR__.'/stubs/pre-commit', base_path('.githooks/pre-commit'));
    }

    public static function addComposerScripts()
    {
        $composer = app()->make(\Whitecube\LaravelPreset\Support\Composer::class);

        $composer->run([
            'config',
            'scripts.pre-install-cmd',
            'git config core.hooksPath .githooks'
        ]);

        $composer->run([
            'config',
            'scripts.pre-update-cmd',
            'git config core.hooksPath .githooks'
        ]);
    }

}
