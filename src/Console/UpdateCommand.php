<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Console;

use Illuminate\Console\Command;

class UpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eshop:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all of the e-shop resources';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment('Updating e-shop Package...');
        $this->shellSilent('composer require mwspace/e-shop');

        $this->comment('Updating e-shop Assets...');
        $this->callSilent('vendor:publish', [
            '--tag' => 'eshop-assets',
            '--force' => true,
        ]);

        $this->comment('Updating e-shop Configuration...');
        $this->callSilent('vendor:publish', [
            '--tag' => 'eshop-config',
            '--force' => true,
        ]);

        $this->comment('Updating e-shop Configuration...');
        $this->callSilent('vendor:publish', [
            '--tag' => 'eshop-config',
            '--force' => true,
        ]);

        $this->comment('Updating e-shop Migration...');
        $this->callSilent('migrate');

        $this->info('e-shop updated successfully.');
    }

    /**
     * @param $command
     * @return string|null
     */
    private function shellSilent($command)
    {
        return shell_exec("$command 2>&1");
    }
}
