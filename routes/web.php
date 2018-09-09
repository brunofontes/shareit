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
    $name = 'Bruno';
    return view('welcome', compact('name'));
});

Route::get('/product', 'ProductController@index');
Route::get('/product/{product}', 'ProductController@show');
Route::get('/item', 'ItemController@index');
Route::get('/item/{item}', 'ItemController@show');