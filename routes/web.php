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

    Route::prefix('category')->group(function(){
        Route::get('/', 'CategoryController@index')->name('admin.category.index');

        Route::get('/add', 'CategoryController@add')->name('admin.category.add');
        Route::post('/store', 'CategoryController@store')->name('admin.category.store');

        Route::get('/edit/{id}', 'CategoryController@edit')->where('id', '[0-9]+')->name('admin.category.edit');
        Route::post('/update', 'CategoryController@update')->name('admin.category.update');

        Route::get('/delete/{id}', 'CategoryController@destroy')->where('id', '[0-9]+')->name('admin.category.delete');

        Route::get('/change-status-active/{id}', 'CategoryController@changeStatusActive')->where('id', '[0-9]+')->name('admin.category.active');
        Route::get('/change-status-disable/{id}', 'CategoryController@changeStatusDisable')->where('id', '[0-9]+')->name('admin.category.disable');
    });

    Route::prefix('comic')->group(function() {
        Route::get('/', 'ComicController@index')->name('admin.comic.index');
        
        Route::get('/add', 'ComicController@add')->name('admin.comic.add');
        Route::post('/store', 'ComicController@store')->name('admin.comic.store');

        Route::get('/edit/{id}', 'ComicController@edit')->where('id', '[0-9]+')->name('admin.comic.edit');
        Route::post('/update', 'ComicController@update')->name('admin.comic.update');

        Route::get('/delete/{id}', 'ComicController@destroy')->where('id', '[0-9]+')->name('admin.comic.delete');

        Route::get('/change-status-active/{id}', 'ComicController@changeStatusActive')->where('id', '[0-9]+')->name('admin.comic.active');
        Route::get('/change-status-disable/{id}', 'ComicController@changeStatusDisable')->where('id', '[0-9]+')->name('admin.comic.disable');


        // Chapters
        Route::get('/{comicId}/chapters', 'ChapterController@index')->where('comicId', '[0-9]+')->name('admin.chapters.index');
        Route::get('/{comicId}/chapters/add', 'ChapterController@add')->where('comicId', '[0-9]+')->name('admin.chapter.add');
        Route::post('/chapters/add', 'ChapterController@store')->name('admin.chapter.store');
        Route::get('/{comicId}/chapter/{chapterId}', 'ChapterController@detail')->where(['comicId', 'chapterId'], '[0-9]+')->name('admin.chapter.detail');
    });

    // Route::prefix('chapter')->group(function() {
    //     Route::('')
    // });
});
