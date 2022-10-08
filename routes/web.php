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

        Route::get('/add', 'CategoryController@add')->name('admin.category.add');
        Route::post('/store', 'CategoryController@store')->name('admin.category.store');

        Route::get('/edit/{id}', 'CategoryController@edit')->where('id', '[0-9]+')->name('admin.category.edit');
        Route::post('/update', 'CategoryController@update')->name('admin.category.update');

        Route::get('/delete/{id}', 'CategoryController@destroy')->where('id', '[0-9]+')->name('admin.category.delete');
        Route::get('/change-status-active/{id}', 'CategoryController@changeStatusActive')->where('id', '[0-9]+')->name('admin.category.active');
        Route::get('/change-status-disable/{id}', 'CategoryController@changeStatusDisable')->where('id', '[0-9]+')->name('admin.category.disable');
    });
});
