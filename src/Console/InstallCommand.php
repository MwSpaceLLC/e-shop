<?php
/**
 * e-shop - A PHP Package for Laravel Framework start (6.x)
 *
 * @package  eshop
 * @author   Aleksandr Ivanovitch <alex@mwspace.com>
 */

namespace MwSpace\Eshop\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return $this->error("Set Database (postgres) Before Instal e-shop");
        }

        do $email = $this->ask('Insert email for e-shop root');
        while ($email == null || !filter_var($email, FILTER_VALIDATE_EMAIL));

        $this->comment('Publishing e-shop Service Provider...');
        $this->callSilent('vendor:publish', ['--tag' => 'eshop-provider']);

        $this->comment('Publishing e-shop Assets...');
        $this->callSilent('vendor:publish', ['--tag' => 'eshop-assets']);

        $this->comment('Publishing e-shop Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'eshop-config']);

        $this->comment('Perform e-shop Migration...');
        $this->callSilent('migrate');

        $this->info("
                        .__                   
  ____             _____|  |__   ____ ______  
_/ __ \   ______  /  ___/  |  \ /  _ \\____ \ 
\  ___/  /_____/  \___ \|   Y  (  <_> )  |_> >
 \___  >         /____  >___|  /\____/|   __/ 
     \/               \/     \/       |__|    

Installed successfully.

Please see backend at: " . route('eshop-login') . "
        ");
    }
}
