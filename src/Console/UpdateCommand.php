<?php

namespace MwSpace\Eshop\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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

        $this->info('e-shop scaffolding updated successfully.');
    }
}
