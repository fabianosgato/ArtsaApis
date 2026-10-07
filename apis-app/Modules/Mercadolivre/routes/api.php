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
use Modules\Mercadolivre\Http\Controllers\Api\MercadoLivreController;

Route::middleware('check.apikey')->prefix('v1')->group(function () {

    Route::prefix('meli')->group(function () {

        Route::get('/', [MercadoLivreController::class, 'index'])
            ->name('meli.index');

        Route::get('/categories', [MercadolivreController::class, 'categories'])
            ->name('meli.categories');

        // Detalhes da Categoria do MercadoLivre
        Route::get('/category-info', [MercadolivreController::class, 'categoryInfo'])
            ->name('meli.categoryInfo');

        // Atributos de uma Categoria do MercadoLivre
        Route::get('/category-attributes', [MercadolivreController::class, 'categoryAttributes'])
            ->name('meli.categoryAttributes');

    });

});
