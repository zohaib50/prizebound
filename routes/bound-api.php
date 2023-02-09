<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bound\CategoryController;
use App\Http\Controllers\Bound\YearController;
use App\Http\Controllers\Bound\ListController;
use App\Http\Controllers\Bound\YourBoundController;
use App\Http\Controllers\Bound\WithDrawBoundController;


Route::middleware('auth')->group(function () {
    Route::get('categories', [CategoryController::class, 'index_api']);
    Route::get('categories/select2', [CategoryController::class, 'select2']);
    Route::delete('category/{id}', [CategoryController::class, 'destroy_api']);

    Route::get('years', [YearController::class, 'index_api']);
    Route::get('years/{cid}/select2', [YearController::class, 'select2']);
    Route::delete('year/{id}', [YearController::class, 'destroy_api']);

    Route::get('number', [ListController::class, 'index_api']);
    Route::post('number', [ListController::class, 'store_api']);
//    Route::get('number/select2', [ListController::class, 'select2']);
    Route::put('number/{id}', [ListController::class, 'update_api']);
    Route::delete('number/{id}', [ListController::class, 'destroy_api']);

    Route::get('your/bounds', [YourBoundController::class, 'index_api']);
    Route::post('your/bound', [YourBoundController::class, 'store_api']);
//    Route::get('number/select2', [ListController::class, 'select2']);
    Route::put('your/bound/{id}', [YourBoundController::class, 'update_api']);
    Route::delete('your/bound/{id}', [YourBoundController::class, 'destroy_api']);

    Route::get('check/bound/list', [WithDrawBoundController::class, 'index_api']);
    Route::get('check/bound/new', [WithDrawBoundController::class, 'check']);
    Route::delete('check/bound/list/{id}', [WithDrawBoundController::class, 'destroy_api']);

});
