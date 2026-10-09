<?php

use Illuminate\Support\Facades\Route;

Route::middleware('check.apikey')->prefix('v1')->group(function () {

    // Rotas da API do Pagarme
    Route::prefix('pagarme')->group(function () {

        Route::get('/', [\Modules\PaymentMethods\Http\Controllers\Api\Pagarme\OrdersApiController::class, 'index'])
            ->name('pagarme.api.index');

        Route::post('/orders', [\Modules\PaymentMethods\Http\Controllers\Api\Pagarme\OrdersApiController::class, 'orders'])
            ->name('pagarme.api.orders');

    });

});