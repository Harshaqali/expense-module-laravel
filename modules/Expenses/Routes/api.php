<?php

use Illuminate\Support\Facades\Route;
use Modules\Expenses\Http\Controllers\ExpenseController;

Route::prefix('api')->group(function () {
    Route::apiResource('expenses', ExpenseController::class);
});
