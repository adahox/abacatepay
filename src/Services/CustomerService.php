<?php

namespace adahox\AbacatePay\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use adahox\AbacatePay\Services\Enums\URI;
use adahox\AbacatePay\Interfaces\Listable;
use adahox\AbacatePay\Interfaces\Creatable;
use adahox\AbacatePay\Requests\CreateCustomerRequest;

class CustomerService implements Creatable, Listable
{
    public function create(Request $request): Response
    {
        $CustomerRequest = CreateCustomerRequest::createFrom($request);

        if ($CustomerRequest->fails()) {
            return response()->json($CustomerRequest->errors(), 400);
        }

        $response = Http::abacatepay()->post(URI::CREATE_CUSTOMER, $request->validated());

        return $response;
    }

    public function list(): Response
    {
        $response = Http::abacatepay()->get(URI::LIST_CUSTOMER);

        return $response;
    }
}