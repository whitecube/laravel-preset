<?php

namespace Whitecube\LaravelPreset;

use Laravel\Ui\UiCommand;

class Gitignore
{

    public static function install(UiCommand $command)
    {
        $command->info('Setting up gitignore file...');

        copy(__DIR__.'/stubs/.gitignore', base_path('.gitignore'));
    }

}
