<?php

namespace adahox\AbacatePay\Services;

use adahox\AbacatePay\Services\Interfaces\Creatable;
use adahox\AbacatePay\Services\Interfaces\Listable;
use Illuminate\Http\Client\Response;
use adahox\AbacatePay\Services\Enums\URI;
use adahox\AbacatePay\Services\Traits\Http\Http;


class CustomerService implements Creatable, Listable
{
    use Http;

    public function create($cliente): Response
    {
        $response = $this->post(URI::ADD_CLIENTE, $cliente);

        return $response;
    }

    public function list(): Response
    {
        $response = $this->get(URI::LIST_CLIENTE);

        return $response;
    }
}