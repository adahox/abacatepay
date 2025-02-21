<?php

namespace adahox\AbacatePay\Services;

use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use adahox\AbacatePay\Services\Enums\URI;
use adahox\AbacatePay\Services\Interfaces\Creatable;
use adahox\AbacatePay\Services\Interfaces\Listable;


class CustomerService implements Creatable, Listable
{
    public function create(Request $request): Response
    {
        $response = Http::abacatepay()->post(URI::CREATE_CUSTOMER, $request->validated());

        return $response;
    }

    public function list(): Response
    {
        $response = Http::abacatepay()->get(URI::LIST_CUSTOMER);

        return $response;
    }
}