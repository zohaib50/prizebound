<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bound\CategoryController;
use App\Http\Controllers\Bound\YearController;
use App\Http\Controllers\Bound\ListController;
use App\Http\Controllers\Bound\YourBoundController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::group(['prefix'=>'bound','as'=>'bound.'], function(){
        Route::resource('category', CategoryController::class);
        Route::resource('year', YearController::class);
        Route::resource('list', ListController::class);
        Route::resource('your', YourBoundController::class);
    });
});
