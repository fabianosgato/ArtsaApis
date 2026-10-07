<?php

use Illuminate\Support\Facades\Route;
use Modules\PaymentMethods\Http\Controllers\PaymentMethodsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('paymentmethods', PaymentMethodsController::class)->names('paymentmethods');
});
