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

        $this->publishes([
            __DIR__ . '/config/abacatepay.php' => config_path('abacatepay.php'),
        ]);

        Http::macro('abacatepay', function () {
            return Http::withHeaders([
                'Authorization' => config('abacatepay.abacate-key'),
            ])->baseUrl('https://api.abacatepay.com/v1');
        });

        Route::post('/abacatepay/cliente', [ClientesController::class, 'create'])->name('abacatepay-create-cliente');
        Route::get('/abacatepay/cliente', [ClientesController::class, 'list'])->name('abacatepay-list-cliente');
        Route::post('/abacatepay/pagamento', [PagamentosController::class, 'create'])->name('abacatepay-create-pagamento');
        Route::get('/abacatepay/pagamento', [PagamentosController::class, 'list'])->name('abacatepay-list-pagamento');
    }

    // public function boot()
    // {
    //     // Registra rotas, views, migrações, etc.
    // }
}