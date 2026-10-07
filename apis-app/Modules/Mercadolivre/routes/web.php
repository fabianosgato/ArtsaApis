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
use Modules\Mercadolivre\Http\Controllers\MercadolivreController;

Route::prefix('meli')->group(function () {

    // Rota de Callback do MercadoLivre
    Route::get('auth', [MercadolivreController::class, 'authUrl'])->name('meli.authUrl');

    // Categorias do MercadoLivre
    Route::get('categories', [MercadolivreController::class, 'categories'])->name('meli.categories');

    // Rota de Notifications Do MercadoLivre
    Route::get('notifications', [MercadolivreController::class, 'notifications'])->name('meli.notifications');

    Route::prefix('oauth')->group(function () {

        // Rota de Callback do MercadoLivre
        Route::get('callback', [MercadolivreController::class, 'callback'])->name('meli.callback');

    });

});
