<?php

namespace adahox\AbacatePay\Services\Interfaces;

use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\Response;

interface Deletable
{
    public function delete(Request $request): Response;
}