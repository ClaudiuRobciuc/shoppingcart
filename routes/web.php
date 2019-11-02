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

Route::get('/', [
    'as' => 'frontpage.index',
    'uses' => 'IndexController@index',
]);

Route::post('/addtocart/{id}', [
    'as' => 'frontpage.product.addToCart',
    'uses' => 'IndexController@addToCart',
]);

Route::get('/shoppingcart', [
    'as' => 'frontpage.shop.index',
    'uses' => 'ShopController@index',
]);

Route::post('/pay', [
    'as' => 'frontpage.shop.buyCart',
    'uses' => 'ShopController@buyCart',
]);

Route::post('/remove', [
    'as' => 'frontpage.shop.removeItem',
    'uses' => 'ShopController@removeItem',
]);