<?php

namespace App\Console\Commands;

use App\Services\PopulateCountries\PopulateCountriesStrategyContext;
use Illuminate\Console\Command;

class ImportCountries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-countries {--provider=devtest}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import countries from desired provider';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $context = new PopulateCountriesStrategyContext($this->option('provider'));
        $context->import();
    }
}
