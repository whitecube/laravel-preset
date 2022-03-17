<?php

namespace App\Console\Commands;

use Composer\Script\Event;

class ComposerEnv
{
    /**
     * Load the local composer repositories, if we find them.
     *
     * @param  \Composer\Script\Event  $event
     * @return void
     */
    public static function loadLocalRepositories(Event $event)
    {
        if (! static::envIsLocal()) {
            return;
        }

        $composer_local_json_path = __DIR__.DIRECTORY_SEPARATOR.'..'
            .DIRECTORY_SEPARATOR.'..'
            .DIRECTORY_SEPARATOR.'..'
            .DIRECTORY_SEPARATOR.'composer.local.json';

        if (! is_readable($composer_local_json_path)) {
            return;
        }

        $local_composer_config = json_decode(file_get_contents($composer_local_json_path), true);

        if (! array_key_exists('repositories', $local_composer_config)) {
            return;
        }

        $repositoryManager = $event->getComposer()->getRepositoryManager();

        foreach ($local_composer_config['repositories'] as $key => $repository) {
            $repository = $repositoryManager->createRepository($repository['type'], $repository, (string) $key);

            $repositoryManager->prependRepository($repository);
        }
    }

    /**
     * Check that environment is local
     *
     * @return bool
     */
    protected static function envIsLocal(): bool
    {
        $env = static::loadEnv();

        return $env['APP_ENV'] === 'local';
    }

    /**
     * Read the env file
     *
     * @return array
     */
    protected static function loadEnv(): array
    {
        $env_path = __DIR__.DIRECTORY_SEPARATOR.'..'
            .DIRECTORY_SEPARATOR.'..'
            .DIRECTORY_SEPARATOR.'..'
            .DIRECTORY_SEPARATOR.'.env';

        if (! is_readable($env_path)) {
            throw new \Exception('.env file is not readable.');
        }

        $lines = file($env_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $env = [];

        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);

            $name = trim($name);
            $value = trim($value, '"');

            $env[$name] = $value;
        }

        return $env;
    }
}
