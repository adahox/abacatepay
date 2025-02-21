<?php

namespace adahox\AbacatePay\Services\Interfaces;

use Illuminate\Http\Client\Response;

interface Deletable
{
    public function delete($resource): Response;
}