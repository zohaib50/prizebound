<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bound\CategoryController;
use App\Http\Controllers\Bound\YearController;
use App\Http\Controllers\Bound\ListController;
use App\Http\Controllers\Bound\YourBoundController;


Route::middleware('auth')->group(function () {
    Route::get('categories', [CategoryController::class, 'index_api']);
    Route::delete('category/{id}', [CategoryController::class, 'destroy_api']);
    Route::get('years', [YearController::class, 'index_api']);
    Route::delete('year/{id}', [YearController::class, 'destroy_api']);
//    Route::resource('year', YearController::class);
//    Route::resource('list', ListController::class);
//    Route::resource('your', YourBoundController::class);
});
