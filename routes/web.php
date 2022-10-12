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

// Admin
Route::domain('admin.' . env('APP_URL'))->group(function() {
    //Route::prefix('adminv2')->group(function() {

        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    
        Route::prefix('category')->group(function(){
            Route::get('/', 'CategoryController@index')->name('admin.category.index');
    
            Route::get('/add', 'CategoryController@add')->name('admin.category.add');
            Route::post('/store', 'CategoryController@store')->name('admin.category.store');
    
            Route::get('/edit/{id}', 'CategoryController@edit')->where('id', '[0-9]+')->name('admin.category.edit');
            Route::post('/update', 'CategoryController@update')->name('admin.category.update');
    
            Route::get('/delete/{id}', 'CategoryController@destroy')->where('id', '[0-9]+')->name('admin.category.delete');
            
            Route::get('{id}/comics', 'CategoryController@listComic')->where('id', '[0-9]+')->name('admin.category.listComic');
    
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
            Route::get('/{comicId}/chapters', 'ChapterController@list')->where('comicId', '[0-9]+')->name('admin.chapters.list');
            Route::get('/{comicId}/chapters/add', 'ChapterController@add')->where('comicId', '[0-9]+')->name('admin.chapter.add');
            Route::post('/chapters/add', 'ChapterController@store')->name('admin.chapter.store');
            Route::get('/{comicId}/chapter/{chapterNumber}', 'ChapterController@preview')->where(['comicId', 'chapterId'], '[0-9]+')->name('admin.chapter.preview');
            Route::get('/chapter/delete/{id}', 'ChapterController@destroy')->where('id', '[0-9]+')->name('admin.chapter.destroy');
        });
    //});
});

// Client
Route::domain('client.' . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return view('client.pages.home.index');
    });
    Route::get('/detail', function () {
        return view('client.pages.comic.detail');
    });
    Route::get('/login', function () {
        return view('client.pages.auth.login');
    });
    Route::get('/signup', function () {
        return view('client.pages.auth.signup');
    });
});