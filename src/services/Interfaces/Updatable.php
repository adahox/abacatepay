<?php

namespace adahox\AbacatePay\Services\Interfaces;

use Illuminate\Http\Client\Response;

interface Updatable
{
    public function update($resource): Response;
}