<?php

namespace adahox\AbacatePay\Commands;

use adahox\AbacatePay\Requests\CreateBillingRequest;
use adahox\AbacatePay\Requests\CreateCustomerRequest;
use adahox\AbacatePay\Services\AbacatePay;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class ValidateBillingCreate extends Command
{
    protected $signature = 'abacate:validate-billing-create';
    protected $description = 'validates if create billing is working';

    public function handle()
    {
        $this->info('Validating the Abacate service payment...');
        $abacatePay = new AbacatePay();

        $billingFormSimulator = [
            'frequency' => 'ONE_TIME',
            'methods' => ['PIX'],
            'products' => [
                [
                    'externalId' => '1',
                    'name' => 'Validate Service',
                    'description' => 'validating billing create service',
                    'quantity' => 1,
                    'price' => 100
                ]
            ],
            'returnUrl' => '',
            'completionUrl' => '',
            'customerId' => ''
        ];

        $request = Request::create('/', 'POST', $billingFormSimulator);

        $createCustomerRequest = CreateBillingRequest::createFrom($request);

        $response = $abacatePay->Customer()->create($createCustomerRequest);

        if ($response->status() === 200) {
            $this->info('Create billing is working.');
        } else {
            $this->error('Create billing is not working: ' . $response->getContent());
        }
    }
}