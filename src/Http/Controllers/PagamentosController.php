<?php

namespace adahox\AbacatePay\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class PagamentosController
{
    public function create(Request $request)
    {
        $response = Http::abacatepay()->post('/billing/create', $request->all());

        return $response->json();
    }

    public function list(Request $request)
    {
        $response = Http::abacatepay()->get('/billing/list');

        return $response->json();
    }
}