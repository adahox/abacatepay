<?php

namespace adahox\AbacatePay\Interfaces;

use Illuminate\Http\Response;

interface Listable
{
    public function list(): Response;
}