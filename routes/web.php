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
Route::domain('admin.' . env('APP_URL'))->group(function () {
    //Route::prefix('adminv2')->group(function() {

    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::prefix('category')->group(function () {
        Route::get('/', 'CategoryController@index')->name('admin.category.index');

        Route::get('/add', 'CategoryController@add')->name('admin.category.add');
        Route::post('/store', 'CategoryController@store')->name('admin.category.store');

        Route::get('{category}/edit', 'CategoryController@edit')->name('admin.category.edit');
        Route::post('{category}/update/', 'CategoryController@update')->name('admin.category.update');

        Route::get('{category}/delete', 'CategoryController@destroy')->name('admin.category.delete');

        // View all comics of this category
        Route::get('{category}/comics', 'CategoryController@listComic')->name('admin.category.listComic');

        Route::get('{category}/change-status-active', 'CategoryController@changeStatusActive')->name('admin.category.active');
        Route::get('{category}/change-status-disable', 'CategoryController@changeStatusDisable')->name('admin.category.disable');
    });

    Route::prefix('comic')->group(function () {
        Route::get('/', 'ComicController@index')->name('admin.comic.index');

        Route::get('/add', 'ComicController@add')->name('admin.comic.add');
        Route::post('/store', 'ComicController@store')->name('admin.comic.store');

        Route::get('{comic}/edit', 'ComicController@edit')->name('admin.comic.edit');
        Route::post('{comic}/update', 'ComicController@update')->name('admin.comic.update');

        Route::get('{comic}/delete', 'ComicController@destroy')->name('admin.comic.delete');

        Route::get('{comic}/change-status-active', 'ComicController@changeStatusActive')->name('admin.comic.active');
        Route::get('{comic}/change-status-disable', 'ComicController@changeStatusDisable')->name('admin.comic.disable');

        // Chapters
        Route::get('/{comic}/chapters', 'ChapterController@list')->name('admin.chapters.list');
        Route::get('/{comic}/chapters/add', 'ChapterController@add')->name('admin.chapter.add');
        Route::post('{comic}/chapters/store', 'ChapterController@store')->name('admin.chapter.store');
        Route::get('/{comic}/chapter/{chapterNumber}', 'ChapterController@preview')->where('chapterNumber', '[0-9]+')->name('admin.chapter.preview');
        Route::get('/chapter/{chapter}/delete', 'ChapterController@destroy')->name('admin.chapter.destroy');
    });

    Route::prefix('slider')->group(function () {
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

    Route::namespace('Client')->group(function () {

        // Trang chu
        Route::get('/', 'HomeController@index')->name('client.home');

        // Authentication
        Route::get('auth/signin', 'AuthController@signin')->name('client.auth.signin');
        Route::post('auth/login', 'AuthController@login')->name('client.auth.login');
        Route::get('auth/signup', 'AuthController@signup')->name('client.auth.signup');
        Route::post('auth/register', 'AuthController@register')->name('client.auth.register');
        Route::get('auth/logout', 'AuthController@logout')->name('client.auth.logout');

        // Show all category active
        Route::get('category', 'CategoryController@list')->name('client.category');

        // Show all comic of this category
        Route::get('category/{category}', 'CategoryController@showListComic')->name('client.category.showListComic');

        // Show detail comic
        Route::get('category/{category}/{comic}', 'ComicController@detail')->name('client.comic.detail');

        // Read chapters of comic
        Route::get('category/{category}/{comic}/chapter/{chapterNumber}', 'ChapterController@read')->where('chapterNumber', '[0-9]+')->name('client.chapter.detail');
    });
});
