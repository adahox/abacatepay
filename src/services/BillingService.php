<?php

namespace adahox\AbacatePay\Services;

use adahox\AbacatePay\Services\Interfaces\Creatable;
use adahox\AbacatePay\Services\Interfaces\Listable;
use Illuminate\Http\Client\Response;
use adahox\AbacatePay\Services\Enums\URI;
use adahox\AbacatePay\Services\Traits\Http\Http;


class BillingService implements Listable, Creatable
{
    use Http;
    public function create($resource): Response
    {
        $response = $this->post(URI::ADD_COBRANCA, $resource);

        return $response;
    }

    public function list(): Response
    {
        $response = $this->get(URI::LIST_COBRANCA);

        return $response;
    }
}