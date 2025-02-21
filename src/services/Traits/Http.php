<?php

namespace adahox\AbacatePay\Services\Traits\Http;

use Illuminate\Support\Facades\Http as LaravelHTTP;
use Illuminate\Http\Client\Response;

trait Http
{
    public function post($uri, $request): Response
    {
        if (!$request) {
            throw new \Error("Request body is required");
        }

        $response = LaravelHTTP::abacatepay()->post($uri, $request);

        return $response;
    }


    public function get($uri): Response
    {
        $response = LaravelHTTP::abacatepay()->get($uri);

        return $response;
    }
}