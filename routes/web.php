<?php

use Composer\Util\Http\Response;
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

Route::get('/', function(){
    return Response('', 200);
});


// Admin
Route::prefix('adminv2')->group(function() {

    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::prefix('/category')->group(function(){
        Route::get('/', 'CategoryController@index')->name('admin.category.index');
        Route::get('/form', 'CategoryController@form')->name('admin.category.form');
        Route::get('/{id}', 'CategoryController@detail')->name('admin.category.detail');
        Route::post('/', 'CategoryController@store')->name('admin.category.store');
    });
});
