<?php

namespace Whitecube\LaravelPreset;

use Laravel\Ui\UiCommand;
use Illuminate\Support\ServiceProvider;
use Whitecube\LaravelPreset\Console\FixStyleCommand;
use Whitecube\LaravelPreset\Components\PublishComponent;

class WhitecubeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        UiCommand::macro('whitecube', function ($command) {
            Preset::install($command);

            $command->info('Whitecube preset installed!');
        });

        $this->commands([
            PublishComponent::class,
        ]);
    }

    /**
     * Register bindings
     *
     * @return void
     */
    public function register()
    {
    }
}
