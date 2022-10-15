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
    
            Route::get('/edit/{category}', 'CategoryController@edit')->name('admin.category.edit');
            Route::post('/update/{category}', 'CategoryController@update')->name('admin.category.update');
    
            Route::get('/delete/{category}', 'CategoryController@destroy')->name('admin.category.delete');
            
            // View all comics of this category
            Route::get('{category}/comics', 'CategoryController@listComic')->name('admin.category.listComic');
    
            Route::get('/change-status-active/{category}', 'CategoryController@changeStatusActive')->name('admin.category.active');
            Route::get('/change-status-disable/{category}', 'CategoryController@changeStatusDisable')->name('admin.category.disable');
        });
    
        Route::prefix('comic')->group(function() {
            Route::get('/', 'ComicController@index')->name('admin.comic.index');
            
            Route::get('/add', 'ComicController@add')->name('admin.comic.add');
            Route::post('/store', 'ComicController@store')->name('admin.comic.store');
    
            Route::get('/edit/{comic}', 'ComicController@edit')->name('admin.comic.edit');
            Route::post('/update/{comic}', 'ComicController@update')->name('admin.comic.update');
    
            Route::get('/delete/{comic}', 'ComicController@destroy')->name('admin.comic.delete');
    
            Route::get('/change-status-active/{comic}', 'ComicController@changeStatusActive')->name('admin.comic.active');
            Route::get('/change-status-disable/{comic}', 'ComicController@changeStatusDisable')->name('admin.comic.disable');
    
    
            // Chapters
            Route::get('/{comic}/chapters', 'ChapterController@list')->name('admin.chapters.list');
            Route::get('/{comic}/chapters/add', 'ChapterController@add')->name('admin.chapter.add');
            Route::post('/chapters/add', 'ChapterController@store')->name('admin.chapter.store');
            Route::get('/{comic}/chapter/{chapterNumber}', 'ChapterController@preview')->where('chapterNumber', '[0-9]+')->name('admin.chapter.preview');
            Route::get('/chapter/delete/{chapter}', 'ChapterController@destroy')->name('admin.chapter.destroy');
        });

        Route::prefix('slider')->group(function() {
            Route::get('/', 'SliderController@index')->name('admin.slider.index');
            
            Route::get('/add', 'SliderController@add')->name('admin.slider.add');
            Route::post('/store', 'SliderController@store')->name('admin.slider.store');
    
            Route::get('/edit/{slider}', 'SliderController@edit')->name('admin.slider.edit');
            Route::post('/update/{slider}', 'SliderController@update')->name('admin.slider.update');
    
            Route::get('/delete/{slider}', 'SliderController@destroy')->name('admin.slider.delete');
    
            Route::get('/change-status-active/{slider}', 'SliderController@changeStatusActive')->name('admin.slider.active');
            Route::get('/change-status-disable/{slider}', 'SliderController@changeStatusDisable')->name('admin.slider.disable');

        });
    //});
});

// Client
Route::domain('client.' . env('APP_URL'))->group(function () {

    Route::namespace('Client')->group(function(){

        // Trang chu
        Route::get('/', 'HomeController@index')->name('client.home');

        // Show all category active
        Route::get('/category', function(){
            return "All Category";
        });

        // Show all comic of this category
        Route::get('/{category}', 'CategoryController@showListComic')->name('client.category.show_list_comic');

        // Show detail comic
        Route::get('/{category}/{comic}', 'ComicController@detail')->name('client.comic.detail');
        
        Route::get('/login', function () {
            return view('client.pages.auth.login');
        });
        Route::get('/signup', function () {
            return view('client.pages.auth.signup');
        });
    });
});