<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Console;

use Illuminate\Console\Command;
use MwSpace\Eshop\Model\AdminEshop;

class QueueCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eshop:queue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Worker Sleep all of the e-shop queue';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment('Perform e-shop Queue in a 3 sleep...');
        $this->callSilent('queue:work', [
            '--sleep' => 3
        ]);

        $this->info("queue run successfully.");

    }
}
