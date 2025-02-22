<?php

namespace adahox\AbacatePay\Services;

use adahox\AbacatePay\Services\CustomerService;
use adahox\AbacatePay\Services\BillingService;

class AbacatePay
{
    public static function Customer(): CustomerService
    {
        return new CustomerService();
    }

    public static function Billing(): BillingService
    {
        return new BillingService();
    }
}
