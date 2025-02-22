<?php

namespace adahox\AbacatePay\Services\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface Updatable
{
    public function update(Request $request): Response;
}