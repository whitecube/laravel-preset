<?php

namespace Whitecube\LaravelPreset\Components;

use Illuminate\Console\Command;
use function Laravel\Prompts\select;
use function Laravel\Prompts\table;

class PublishComponent extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'publish:component';

    /**
     * The console command description.
     */
    protected $description = 'Publish one of Whitecube\'s preset components';

    /**
     * The console command description.
     */
    protected Repository $repository;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->repository = new Repository();
        
        $publisher = $this->promptForComponentPublisher();

        if(! $publisher) {
            $this->error('Command publisher could not be found!');
            return static::FAILURE;
        }

        $files = $publisher->handle();

        $result = $files->publish();

        table(
            ['File', 'Publication'],
            array_map(fn($path, $status) => [$path, $status ? 'OK' : 'Failure'], array_keys($result), array_values($result)),
        );

        return static::SUCCESS;
    }

    /**
     * Prompt and return the wanted component publisher.
     */
    protected function promptForComponentPublisher(): ?PublisherInterface
    {
        $classname = select(
            label: 'Which component do you want to publish?',
            options: $this->repository->getOptions(),
        );

        return $this->repository->get($classname);
    }
}
