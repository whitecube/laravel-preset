<?php

namespace Whitecube\LaravelPreset;

use Laravel\Ui\UiCommand;

class Codestyle
{

    public static function install(UiCommand $command)
    {
        $command->info('Installing code style fixer...');

        copy(__DIR__.'/stubs/pint.json', base_path('pint.json'));
    }

}
