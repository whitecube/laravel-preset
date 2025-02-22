<?php

namespace Whitecube\LaravelPreset;

use Laravel\Ui\UiCommand;

class Pest
{
    public static function install(UiCommand $command)
    {
        $command->info('Initializing Pest into the project...');
        
        shell_exec('PEST_NO_SUPPORT=true ./vendor/bin/pest --init');
    }
}
