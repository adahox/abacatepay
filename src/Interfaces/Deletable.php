<?php

namespace adahox\AbacatePay\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface Deletable
{
    public function delete(Request $request): Response;
}