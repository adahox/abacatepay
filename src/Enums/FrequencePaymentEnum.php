<?php

namespace adahox\AbacatePay\Enums;

enum FrequencePaymentEnum: string
{
    const ONE_TIME = "ONE_TIME";
}


$response = $client->request('POST', 'https://api.abacatepay.com/v1/billing/create', [
    'body' => '{"frequency":"ONE_TIME","methods":["PIX"],"products":[{"externalId":"450","name":"acesso-digital","description":"acesso digital por um mes","quantity":1,"price":5000}],"returnUrl":"http://localhost:8000/","completionUrl":"http://localhost:8000/status","customerId":"cust_FDwzwsA2mStHrHGSetmPLCxE"}',
    'headers' => [
        'accept' => 'application/json',
        'authorization' => 'Bearer abc_dev_2dpseunW5MekjYabzFk1wUwD',
        'content-type' => 'application/json',
    ],
]);
