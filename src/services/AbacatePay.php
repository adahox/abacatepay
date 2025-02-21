<?php

namespace adahox\AbacatePay\Services;

use adahox\AbacatePay\Resources\ClienteResource;
use adahox\AbacatePay\Resources\CobrancaResource;

class AbacatePay
{
    public static function Cliente()
    {
        return new ClienteResource();
    }

    public static function Cobranca(): CobrancaResource
    {
        return new CobrancaResource();
    }
}
