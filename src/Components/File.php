<?php

namespace Whitecube\LaravelPreset\Components;

use Illuminate\Support\Facades\File as LaravelFileFacade;

class File
{
    /**
     * The original stub's path.
     */
    protected ?string $origin = null;

    /**
     * The file publication path.
     */
    protected string $destination;

    /**
     * The file content.
     */
    protected string $content;

    /**
     * Create a new components repository instance.
     */
    public function __construct(string $destination, string $content, ?string $origin = null)
    {
        $this->origin = $origin;
        $this->destination = $destination;
        $this->content = $content;
    }

    /**
     * Create a new file instance from an existing stub file.
     */
    public static function makeFromStub(string $destination, string $stub): ?static
    {
        $origin = realpath(__DIR__ . '/../../' . $stub);

        if(! $origin) {
            return null;
        }

        return static::make(
            origin: $origin, 
            destination: $destination,
            content: file_get_contents($origin),
        );
    }

    /**
     * Create a new file instance with the provided content.
     */
    public static function make(string $destination, string $content, ?string $origin = null): static
    {
        preg_match('/.+\/(?:[^\.]+)\.(.+)$/', $destination, $match);

        $extension = $match[1] ?? null;

        $classname = match ($extension) {
            'scss' => ScssFile::class,
            'blade.php' => BladeFile::class,
            default => File::class,
        };

        return new $classname(
            destination: $destination,
            content: $content,
            origin: $origin,
        );
    }

    /**
     * Get the file's destination path.
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * Check if the wanted destination already exists.
     */
    public function destinationExists(): bool
    {
        return file_exists($this->getDestination());
    }

    /**
     * Create the file with its content at the destination.
     */
    public function publish(): bool
    {
        $path = $this->getDestination();

        LaravelFileFacade::ensureDirectoryExists(pathinfo($path, PATHINFO_DIRNAME));

        $result = file_put_contents(
            filename: $path,
            data: $this->content,
        );

        return ($result === false) ? false : true;
    }
}
