<?php

namespace Whitecube\LaravelPreset;

use Laravel\Ui\UiCommand;
use Illuminate\Support\ServiceProvider;
use Whitecube\LaravelPreset\Console\FixStyleCommand;

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
            Preset::install($command);

            $command->info('Whitecube preset installed!');
        });
    }

    /**
     * Register bindings
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            FixStyleCommand::class
        ]);
    }
}
