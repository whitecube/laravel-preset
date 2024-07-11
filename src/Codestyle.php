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
    }

    public static function copyStubs()
    {
        copy(__DIR__.'/stubs/pint.json', base_path('pint.json'));

        File::ensureDirectoryExists('.githooks');
    }

}
