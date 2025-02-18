<?php

namespace adahox\AbacatePay\Commands;

use Illuminate\Console\Command;

class ValidateAbacateServicePayCommand extends Command
{
    protected $signature = 'abacate:validate-service-pay';
    protected $description = 'Validate the Abacate service payment';

    public function handle()
    {
        $this->info('Validating Abacate service payment...');
    }
}