<?php

namespace Whitecube\LaravelPreset;

use \File;
use Laravel\Ui\UiCommand;

class Assets
{

    public static function install(UiCommand $command)
    {
        $command->info('Cleaning up resources...');
        File::ensureDirectoryExists('resources/img');
        File::ensureDirectoryExists('resources/fonts');
        File::ensureDirectoryExists('resources/icons');
        File::ensureDirectoryExists('resources/favicon');
    }

}
