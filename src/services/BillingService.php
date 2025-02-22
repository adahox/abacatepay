<?php

namespace adahox\AbacatePay\Services;

use adahox\AbacatePay\Requests\CreateBillingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use adahox\AbacatePay\Services\Enums\URI;
use adahox\AbacatePay\Services\Interfaces\Creatable;
use adahox\AbacatePay\Services\Interfaces\Listable;

class BillingService implements Creatable, Listable
{
    public function create(Request $request): Response
    {
        $CustomerRequest = CreateBillingRequest::createFrom($request);

        if ($CustomerRequest->fails()) {
            return response()->json($CustomerRequest->errors(), 400);
        }

        $response = Http::abacatepay()->post(URI::CREATE_BILLING, $request->validated());

        return $response;
    }

    public function list(): Response
    {
        $response = Http::abacatepay()->get(URI::LIST_BILLING);

        return $response;
    }
}