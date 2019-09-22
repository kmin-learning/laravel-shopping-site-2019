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

Route::get('/', 'ProductController@index');

// AUTH
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route to show product detail
Route::get('product_detail/{id}','ProductController@show');

Route::post('command_add_product','CartController@store');
Route::get('Cart_detail','CartController@index');

//Route admin
Route::prefix('admin')->group( function() {
    Route::get('order_list', 'OrderController@index')->name('order_list');
    Route::get('order_detail/{id}','OrderController@show');
});

//Auto fill the text to search
Route::post('auto_fill','ProductController@fetch');
//Search keyword to find the product
Route::get('command_search_keyword_product','ProductController@search_keyword');
