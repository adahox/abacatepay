<?php

namespace adahox\AbacatePay\Services\Enums;

enum URI: string
{
    case CREATE_CUSTOMER = '/customer/create';
    case CREATE_BILLING = '/billing/create';
    case LIST_CUSTOMER = '/customer/list';
    case LIST_BILLING = '/billing/list';
}