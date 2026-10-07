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
use Modules\PaymentMethods\Http\Controllers\PaymentMethodsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('paymentmethods', PaymentMethodsController::class)->names('paymentmethods');
});

/**
 * Rotas para o admin wsdadm
 */
Route::prefix('wsdadm')->middleware('auth')->group(function () {

    // Inicializa as rotas do Admin
    Route::prefix('payment-methods')->middleware('auth')->group(function () {

        Route::prefix('orders')->group(function () {

            Route::get('/', [PaymentMethodsController::class, 'index'])
                ->middleware('auth')
                ->name('wsdadm.payments');

            Route::get('edit/{id}', [PaymentMethodsController::class, 'edit'])
                ->middleware('auth')
                ->name('wsdadm.payments.view');

            Route::get('insert', [PaymentMethodsController::class, 'insert'])
                ->middleware('auth')
                ->name('wsdadm.payments.insert');

        });

    });

});
