<?php

namespace Whitecube\LaravelPreset\Components;

class File
{
    /**
     * The original stub path.
     */
    protected string $origin;

    /**
     * The publication path.
     */
    protected string $destination;

    /**
     * The file content.
     */
    protected string $content;

    /**
     * Create a new components repository instance.
     */
    public function __construct(string $origin, string $destination)
    {
        $this->origin = $origin;
        $this->destination = $destination;
        $this->content = file_get_contents($this->origin);
    }

    /**
     * Create a new components repository instance.
     */
    public static function make(string $stub, string $destination): ?static
    {
        $origin = realpath(__DIR__ . '/../../' . $stub);

        if(! $origin) {
            return null;
        }

        return new static($origin, $destination);
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
        $result = file_put_contents(
            filename: $this->getDestination(),
            data: $this->content,
        );

        return ($result === false) ? false : true;
    }
}
