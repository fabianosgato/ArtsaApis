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
 * Rotas padroes do sistema
 */

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\Dashboard;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

// Login na raiz
Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

// Rotas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/wsdadm', [Dashboard::class, 'index'])
        ->name('wsdadm.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/wsdadm/manual', [Dashboard::class, 'manual'])
        ->name('wsdadm.manual');
});

require __DIR__ . '/auth.php';