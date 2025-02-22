<?php

namespace adahox\AbacatePay\Interfaces;

use Illuminate\Http\Client\Response;

interface Listable
{
    public function list(): Response;
}