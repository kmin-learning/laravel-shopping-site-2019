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

Route::get('/', 'ProductController@index')->name('product_homepage');

// AUTH
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route to show product detail
Route::get('product_detail/{id}','ProductController@show');

Route::post('command_add_product','CartController@store');
Route::get('Cart_detail','CartController@index')->name('Cart_detail');
Route::get('check_out','CheckOutController@index');
Route::get('update_quantity/{id}', 'CartController@update');

//Route admin
Route::prefix('admin')->group( function() {
    Route::get('order_list', 'OrderController@index')->name('order_list');
    Route::get('order_detail/{id}','OrderController@show');
});

//Auto fill the text to search
Route::post('auto_fill','ProductController@fetch');
//Search keyword to find the product
Route::get('command_search_keyword_product','ProductController@search_keyword');

Route::get('testProduct', function(){
    Cart::destroy();
    //Cart::Add([['id' => 1, 'name' => 'TV Sony', 'qty' => 1, 'price' => 100]]);
    //dd(Cart::content());
    //dd(Cart::count());
});

//Route add cart into database
Route::post('save_order','OrderController@store')->name('save_order');