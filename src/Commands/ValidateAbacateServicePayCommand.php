<?php

namespace adahox\AbacatePay\Commands;

use adahox\AbacatePay\Requests\CreateCustomerRequest;
use adahox\AbacatePay\Services\AbacatePay;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class ValidateAbacateServicePayCommand extends Command
{
    protected $signature = 'abacate:validate-service-pay';
    protected $description = 'Validate the Abacate service payment';

    public function handle()
    {
        $this->info('Validating the Abacate service payment...');
        $abacatePay = new AbacatePay();

        $formData = [
            'name' => 'John Doe',
            'email' => 'John@doe.com',
            'cellphone' => '31993543165',
            'taxId' => '15244558755'
        ];

        $request = Request::create('/', 'POST', $formData);

        $createCustomerRequest = CreateCustomerRequest::createFrom($request);

        $request = $abacatePay->Customer()->create($createCustomerRequest);

        if ($request->status() === 200) {
            $this->info('The Abacate service payment is valid!');
        } else {
            $this->error('The Abacate service payment is invalid!');
        }
    }
}