<?php

namespace adahox\AbacatePay\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;

interface Deletable
{
    public function delete(Request $request): Response;
}