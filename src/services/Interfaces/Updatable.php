<?php

namespace adahox\AbacatePay\Services\Interfaces;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Client\Request;

interface Updatable
{
    public function update(Request $request): Response;
}