<?php
/**
 * Fabiano Gato
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 *
 * Não editar ou acrescentar à este arquivo se você quiser fazer o upgrade para versões
 * mais recentes no futuro.
 *****************************************************
 *
 * @copyright    Copyright (c) Fabiano Gato
 * @author       Fabiano Gato <fabianogattoti@gmail.com>
 *
 */

use Illuminate\Support\Facades\Route;


Route::middleware('check.apikey')->prefix('v1')->group(function () {

    // Rotas da API do Pagarme
    Route::prefix('pagarme')->group(function () {

        Route::get('/', [Modules\Pagarme\Http\Controllers\Api\PagarmeApiController::class, 'index'])
            ->name('pagarme.api.index');

        Route::post('/orders', [Modules\Pagarme\Http\Controllers\Api\PagarmeApiController::class, 'orders'])
            ->name('pagarme.api.orders');

    });




});