<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bound\CategoryController;
use App\Http\Controllers\Bound\YearController;
use App\Http\Controllers\Bound\ListController;
use App\Http\Controllers\Bound\YourBoundController;

Route::middleware('auth')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('year', YearController::class);
    Route::resource('list', ListController::class);
    Route::resource('your', YourBoundController::class);
});
