<?php

namespace Whitecube\LaravelPreset;

use Laravel\Ui\UiCommand;

class Pest
{
    public static function install(UiCommand $command)
    {
        $command->info('Preparing Pest...');
        
        shell_exec('./vendor/bin/pest --init');
    }
}
