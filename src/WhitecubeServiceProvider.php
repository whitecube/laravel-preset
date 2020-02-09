<?php

namespace Whitecube\LaravelPreset;

use Laravel\Ui\UiCommand;
use Illuminate\Support\ServiceProvider;

class WhitecubeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        UiCommand::macro('whitecube', function ($command) {
            Preset::install();

            $command->info('Whitecube preset installed!');
            $command->comment('Please run "yarn && yarn dev" to finish installation.');
        });
    }
}