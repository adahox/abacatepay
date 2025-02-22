<?php

namespace adahox\AbacatePay;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use adahox\AbacatePay\Http\Controllers\ClientesController;
use adahox\AbacatePay\Http\Controllers\PagamentosController;
use adahox\AbacatePay\Commands\ValidateBillingCreate;
use adahox\AbacatePay\Commands\ValidateCustomerCreate;

class AbacatePayServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            ValidateCustomerCreate::class,
            ValidateBillingCreate::class
        ]);
    }

    public function boot()
    {
        Http::macro('abacatepay', function () {
            return Http::withHeaders([
                'Authorization' => config('abacatepay.abacate-key'),
            ])->baseUrl('https://api.abacatepay.com/v1');
        });

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->publishes([
            __DIR__ . '/database/migrations' => database_path('migrations'),
        ], 'migrations');


        $this->publishes([
            __DIR__ . '/Models' => app_path('Models'),
        ], 'models');


        $this->publishes([
            __DIR__ . '/config/abacatepay.php' => config_path('abacatepay.php'),
        ]);
    }
}