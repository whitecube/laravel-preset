<?php

namespace Whitecube\LaravelPreset\Components;

use Illuminate\Console\Command;
use function Laravel\Prompts\select;
use function Laravel\Prompts\table;
use function Laravel\Prompts\info;
use function Laravel\Prompts\confirm;

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

        if(! $this->promptIfFilesShouldBeOverwritten($files)) {
            info('Files have not been published.');
            return static::SUCCESS;
        }

        info('Publishing files...');

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

    /**
     * Prompt and return the wanted component publisher.
     */
    protected function promptIfFilesShouldBeOverwritten(FilesCollection $files): bool
    {
        $existing = $files->filter(fn($file) => $file->destinationExists());

        if($existing->isEmpty()) {
            return true;
        }

        info('⚠️ The following files will be overwritten:');

        table(
            ['File'],
            $existing->map(fn($file) => [$file->getDestination()])->values()->all()
        );

        return confirm(
            label: 'Do you wish to proceed?',
            default: false,
        );
    }
}
