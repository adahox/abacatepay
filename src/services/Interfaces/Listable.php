<?php

namespace adahox\AbacatePay\Services\Interfaces;

use Illuminate\Http\Response;

interface Listable
{
    public function list(): Response;
}