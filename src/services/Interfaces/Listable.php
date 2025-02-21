<?php

namespace adahox\AbacatePay\Services\Interfaces;

use Illuminate\Http\Client\Response;

interface Listable
{
    public function list(): Response;
}