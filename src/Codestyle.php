<?php

namespace Whitecube\LaravelPreset;

use Laravel\Ui\UiCommand;

class Codestyle
{

    public static function install(UiCommand $command)
    {
        $command->info('Installing code style fixer...');
        $command->call('vendor:publish', [
            '--provider' => 'MattAllan\LaravelCodeStyle\ServiceProvider'
        ]);
    }

}
