<?php

use Illuminate\Http\Request;

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

    Route::get('/fetch/product', 'ProductController@fetchAll');
    Route::get('/product', 'ProductController@fetchAll');
    Route::get('/product/{count}', 'ProductController@pick');
    Route::get('/product/byBrand/{brand}', 'ProductController@fetchProductByBrand');
    Route::get('/product/byCategory/{category}', 'ProductController@fetchProductByCategory');
    Route::get('/product/byGender/{gender}', 'ProductController@fetchProductByGender');
    Route::get('/all/category', 'ProductController@fetchAllCategory');
    Route::get('/all/brand', 'ProductController@fetchAllBrand');
    Route::post('/add/cart', 'ProductController@addToCart');
