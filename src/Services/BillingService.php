<?php

namespace adahox\AbacatePay\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use adahox\AbacatePay\Services\Enums\URI;
use adahox\AbacatePay\Interfaces\Listable;
use Illuminate\Support\Facades\Validator;
use adahox\AbacatePay\Interfaces\Creatable;
use adahox\AbacatePay\Requests\CreateBillingRequest;

class BillingService implements Creatable, Listable
{
    public function create(Request $request): Response
    {
        $billingRequest = CreateBillingRequest::createFrom($request);

        $validator = Validator::make($billingRequest->all(), $billingRequest->rules());

        if ($validator->fails()) {
            return response()->make(['errors' => $validator->errors()], 422);
        }

        $response = Http::abacatepay()->post(URI::CREATE_BILLING->value, $request->validated());

        return $response;
    }

    public function list(): Response
    {
        $response = Http::abacatepay()->get(URI::LIST_BILLING->value);

        return $response;
    }
}