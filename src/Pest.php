<?php

namespace Whitecube\LaravelPreset;

use Laravel\Ui\UiCommand;

class Pest
{
    public static function install(UiCommand $command)
    {
        $command->info('Preparing Pest...');
        $command->call('pest:install', [
            '--no-interaction' => true,
        ]);
    }
}
