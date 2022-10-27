<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('/categories', 'API\CategoryController');
Route::apiResource('/comic', 'API\CategoryController');

// Route::post('/register', 'Auth\RegisterController@register');
// Route::post('/login', 'Auth\LoginController@login');