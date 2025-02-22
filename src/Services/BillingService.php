<?php

namespace adahox\AbacatePay\Services;

use adahox\AbacatePay\Services\Enums\URI;
use adahox\AbacatePay\Interfaces\Listable;
use adahox\AbacatePay\Interfaces\Creatable;
use adahox\AbacatePay\Requests\CreateBillingRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Validator;

use GuzzleHttp\Psr7\Response as GuzzleResponse;

class BillingService implements Creatable, Listable
{
    public function create(Request $request): Response
    {
        $billingRequest = CreateBillingRequest::createFrom($request);

        $validator = Validator::make($billingRequest->all(), $billingRequest->rules());

        if ($validator->fails()) {

            $content = json_encode(['errors' => $validator->errors()], JSON_UNESCAPED_UNICODE);

            return new Response(
                new GuzzleResponse(
                    422,
                    ['Content-Type' => 'application/json'],
                    $content
                )
            );
        }

        $response = Http::abacatepay()->post(URI::CREATE_BILLING->value, $validator->validated());

        return $response;
    }

    public function list(): Response
    {
        $response = Http::abacatepay()->get(URI::LIST_BILLING->value);

        return $response;
    }
}