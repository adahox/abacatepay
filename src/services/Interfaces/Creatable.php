<?php

namespace adahox\AbacatePay\Services\Interfaces;

use Illuminate\Http\Response;

interface Creatable
{
    public function create(\Illuminate\Foundation\Http\FormRequest $request): Response;
}