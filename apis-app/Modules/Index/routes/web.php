<?php

use Illuminate\Support\Facades\Route;
use Modules\Index\Http\Controllers\IndexController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('indices', IndexController::class)->names('index');
});
