<?php

namespace adahox\AbacatePay\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use adahox\AbacatePay\Services\Enums\URI;
use adahox\AbacatePay\Services\Interfaces\Creatable;
use adahox\AbacatePay\Services\Interfaces\Listable;

class BillingService implements Listable, Creatable
{
    public function create($resource): Response
    {
        $response = Http::abacatepay()->post(URI::CREATE_BILLING, $resource);

        return $response;
    }

    public function list(): Response
    {
        $response = Http::abacatepay()->get(URI::LIST_BILLING);

        return $response;
    }
}