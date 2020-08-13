<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'ProductsController@index')->name("products");
Route::get('/products/create', 'ProductsController@create')->name("create_products");
Route::post('/products/store', 'ProductsController@store')->name("store_products");
Route::get('/products/{id}', 'ProductsController@show')->name("product");