<?php

namespace Whitecube\LaravelPreset\Console;

use Illuminate\Console\Command;

class FixStyleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:style';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run PHP CS Fixer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        shell_exec('vendor/bin/php-cs-fixer fix');

        return 1;
    }
}
