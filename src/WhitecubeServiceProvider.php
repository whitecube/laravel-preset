<?php

namespace Whitecube\LaravelPreset;

use Laravel\Ui\UiCommand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;

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

        $this->setViteMacros();
    }

    protected function setViteMacros(): void
    {
        Vite::macro('image', fn (string $asset) => $this->asset('resources/img/'.$asset));       
    }
}
