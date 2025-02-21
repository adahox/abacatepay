<?php

namespace adahox\AbacatePay\Services\Enums;

enum URI: string
{
    case ADD_CLIENTE = '/customer/create';
    case ADD_COBRANCA = '/billing/create';
    case LIST_CLIENTE = '/customer/list';
    case LIST_COBRANCA = '/billing/list';
}