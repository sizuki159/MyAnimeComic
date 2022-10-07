<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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


Route::prefix('adminv2')->group(function() {

    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::prefix('/categories')->group(function(){
        Route::get('/', 'CategoryController@index')->name('admin.categories.index');
        Route::post('/', 'CategoryController@store')->name('admin.categories.store');
    });
});



