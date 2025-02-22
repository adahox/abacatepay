<?php

namespace adahox\AbacatePay\Commands;

use App\Models\AbacatePayBillingModel;

use adahox\AbacatePay\Services\AbacatePay;
use \adahox\AbacatePay\Requests\CreateBillingRequest;

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
            "customer" => [
                'name' => 'John Doe',
                'email' => 'JohnBilling@doe.com',
                'cellphone' => '31993543165',
                'taxId' => '11152166603'
            ],
            'returnUrl' => 'https://www.google.com',
            'completionUrl' => 'https://www.google.com/'
        ];

        $request = Request::create('/', 'POST', $billingFormSimulator);

        $createBillingRequest = CreateBillingRequest::createFrom($request);

        $response = $abacatePay->Billing()->create($createBillingRequest);

        if ($response->status() === 200) {
            $this->info('billing service is working');

            $this->info("trying add billing on table...");

            $customer = new AbacatePayBillingModel();

            $data_response = $response->json()['data'];

            $bill = [
                'payment_id' => $data_response['id'],
                'status' => $data_response['status'],
                'customer_taxId' => $data_response['customer']["metadata"]['taxId'],
                'customer_name' => $data_response['customer']["metadata"]['name'],
                'customer_email' => $data_response['customer']["metadata"]['email'],
                'customer_cellphone' => $data_response['customer']["metadata"]['cellphone'],
                'payment_method' => $data_response['methods'][0],
                'frequency' => $data_response['frequency'],
                'amount' => $data_response['amount'],
                'fee' => $data_response['metadata']['fee'],
                'produto_id' => $data_response['products'][0]['id'],
                'produto_externalId' => $data_response['products'][0]['externalId'],
                'produto_quantity' => $data_response['products'][0]['quantity'],
            ];

            $customer->addIfNotExist($bill);
        } else {
            $this->error('Create billing is not working: ' . $response->body());
        }
    }
}