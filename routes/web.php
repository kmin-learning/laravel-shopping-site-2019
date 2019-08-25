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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
    $name = "vcttai";
    $web = "https://nhungdongcodevui.com";

    return view('about', [
        'view_name' => $name,
        'view_web' => $web
    ]);
});

Route::get('home', function() {
    return view('home');
});

//ROUTES OF POSTS
Route::get('/posts', 'PostController@index');

Route::get('/post_detail/{id}', 'PostController@show');


//ROUTES OF blade
Route::get('/test_master_layout', function(){
    return view('layouts.master');
});

Route::get('/child_page_1', function(){
    return view('layouts.child_page_1');
});

// AUTH
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
