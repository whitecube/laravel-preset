<?php

namespace Whitecube\LaravelPreset;

use Laravel\Ui\UiCommand;

class Storage
{
    public static function install(UiCommand $command)
    {
        $command->info('Preparing storage...');
        $command->call('storage:link', [
            '--no-interaction' => true,
        ]);
    }
}
