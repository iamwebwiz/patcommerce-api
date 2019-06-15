<?php

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

Route::namespace ('API')->group(function () {
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');

    Route::prefix('categories')->group(function () {
        Route::get('/', 'CategoryController@index');
        Route::post('/', 'CategoryController@store');
        Route::get('/{category}', 'CategoryController@show');
        Route::patch('/{category}', 'CategoryController@update');
        Route::delete('/{category}', 'CategoryController@destroy');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductController@index');
        Route::post('/', 'ProductController@store');
        Route::get('/{product}', 'ProductController@show');
        Route::patch('/{product}', 'ProductController@update');
        Route::delete('/{product}', 'ProductController@destroy');
    });

    Route::prefix('cart')->group(function () {
        Route::get('/', 'CartController@index');
        Route::post('/add', 'CartController@store');
    });
});
