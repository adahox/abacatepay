<?php

namespace adahox\AbacatePay\Commands;

use adahox\AbacatePay\Requests\CreateCustomerRequest;
use adahox\AbacatePay\Services\AbacatePay;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class ValidateCustomerCreate extends Command
{
    protected $signature = 'abacate:validate-customer-create';
    protected $description = 'validates if create customer is working';

    public function handle()
    {
        $this->info('Validating the Abacate service payment...');
        $abacatePay = new AbacatePay();

        $customerFormSimulator = [
            'name' => 'John Doe',
            'email' => 'John@doe.com',
            'cellphone' => '',
            'taxId' => ''
        ];

        $request = Request::create('/', 'POST', $customerFormSimulator);

        $createCustomerRequest = CreateCustomerRequest::createFrom($request);

        $response = $abacatePay->Customer()->create($createCustomerRequest);

        if ($response->status() === 200) {
            $this->info('customer service is working');
        } else {
            $this->error('customer service is not working: ' . $response->getContent());
        }
    }
}