<?php

namespace adahox\AbacatePay\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use adahox\AbacatePay\Services\Enums\URI;
use adahox\AbacatePay\Interfaces\Listable;
use adahox\AbacatePay\Interfaces\Creatable;
use adahox\AbacatePay\Requests\CreateCustomerRequest;
use Illuminate\Support\Facades\Validator;

class CustomerService implements Creatable, Listable
{
    public function create(Request $request): Response
    {
        $customerRequest = CreateCustomerRequest::createFrom($request);

        $validator = Validator::make($customerRequest->all(), $customerRequest->rules());

        if ($validator->fails()) {
            return response()->make(['errors' => $validator->errors()], 422);
        }

        $response = Http::abacatepay()->post(URI::CREATE_CUSTOMER->value, $validator->validated());

        return $response;
    }

    public function list(): Response
    {
        $response = Http::abacatepay()->get(URI::LIST_CUSTOMER->value);

        return $response;
    }
}