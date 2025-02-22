<?php

namespace adahox\AbacatePay\Services;

use adahox\AbacatePay\Requests\CreateBillingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use adahox\AbacatePay\Services\Enums\URI;
use adahox\AbacatePay\Interfaces\Creatable;
use adahox\AbacatePay\Interfaces\Listable;
use Illuminate\Support\Facades\Validator;

class BillingService implements Creatable, Listable
{
    public function create(Request $request): Response
    {
        $billingRequest = CreateBillingRequest::createFrom($request);

        $validator = Validator::make($billingRequest->all(), $billingRequest->rules());

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
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