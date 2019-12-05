<?php

namespace MwSpace\Eshop\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eshop:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all of the e-shop resources';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment('Publishing e-shop Service Provider...');
        $this->callSilent('vendor:publish', ['--tag' => 'eshop-provider']);

        $this->comment('Publishing e-shop Assets...');
        $this->callSilent('vendor:publish', ['--tag' => 'eshop-assets']);

        $this->comment('Publishing e-shop Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'eshop-config']);

        $this->info('e-shop scaffolding installed successfully.');
    }
}
