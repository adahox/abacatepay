<?php

namespace adahox\AbacatePay;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use adahox\AbacatePay\Http\Controllers\ClientesController;
use adahox\AbacatePay\Http\Controllers\PagamentosController;
use adahox\AbacatePay\Commands\ValidateAbacateServicePayCommand;

class AbacatePayServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->commands([
            ValidateAbacateServicePayCommand::class
        ]);

    }

    public function boot()
    {
        Http::macro('abacatepay', function () {
            return Http::withHeaders([
                'Authorization' => config('abacatepay.abacate-key'),
            ])->baseUrl('https://api.abacatepay.com/v1');
        });

        $this->publishes([
            __DIR__ . '/config/abacatepay.php' => config_path('abacatepay.php'),
        ]);
    }
}