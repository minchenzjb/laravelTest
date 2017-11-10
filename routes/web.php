<?php

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

// routes for product
Route::get('/', 'ProductController@showProducts');
Route::get('/products', 'ProductController@showProducts');
Route::get('/products/categories/{name}', 'ProductController@showProductCategories');
Route::get('/products/brands/{name}/{category?}', 'ProductController@showProductBrands');


// routes for cart
Route::get('/cart-add/{id}', 'CartController@cartAdd');
Route::get('/cart', 'CartController@cartShow');
Route::get('/cart-delete/{id}', 'CartController@cartDelete');
Route::get('/clear-cart', 'CartController@cartEmpty');


Route::get('/checkout/{json}', 'Front@checkout');


