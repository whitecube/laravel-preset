<?php

namespace Whitecube\LaravelPreset\Support;

class Composer extends \Illuminate\Support\Composer
{
    public function run(array $command)
    {
        // findComposer() resolves to composer's binary
        // $command is an array that looks like ['composer', 'some-composer-command']
        $command = array_merge($this->findComposer(), $command);

        // we then pass the command array to getProcess()
        // getProcess() returns a Symfony Process() instance, which runs the command for us in the shell
        // the run() method execute the composer command
        $this->getProcess($command)->run(function ($type, $data) {
            // $type can be 'err' or 'out'
            // 'err' when there is an error
            // 'out' is stdout from the command

            // $data is the command output
            // ie whatever composer spits out when the command runs.
            echo $data;
        }, [
            // we can pass in env var to the process instance here
            // setting any additional environmental variable to the process
            'COMPOSER_HOME' => '$HOME/.config/composer'
        ]);
    }
}
