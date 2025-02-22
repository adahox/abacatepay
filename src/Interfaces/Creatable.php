<?php

namespace adahox\AbacatePay\Interfaces;

use Illuminate\Http\Client\Response;

interface Creatable
{
    public function create(\Illuminate\Foundation\Http\FormRequest $request): Response;
}