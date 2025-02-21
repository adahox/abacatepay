<?php

namespace adahox\AbacatePay\Services\Interfaces;

use adahox\AbacatePay\Services\Interfaces\AbacateResource;
use Illuminate\Http\Client\Response;

interface ClienteResource extends AbacateResource
{
    public string $name;
    public string $cellphone;
    public string $taxId;
    public string $email;
}
