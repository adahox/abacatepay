<?php

namespace adahox\AbacatePay\Services\Interfaces;

use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\Response;

interface Creatable
{
    public function create(Request $request): Response;
}