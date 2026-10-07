<?php

use Illuminate\Support\Facades\Route;
use Modules\Pagarme\Http\Controllers\PagarmeController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('pagarmes', PagarmeController::class)->names('pagarme');
});
