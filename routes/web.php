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

Route::get('/product', 'ProductController@index')->middleware('auth');
Route::get('/product/{product}', 'ProductController@show')->middleware('auth');
Route::post('/product', 'ProductController@store')->middleware('auth');

Route::get('/item', 'ItemController@index')->middleware('auth');
Route::get('/item/{item}', 'ItemController@show')->middleware('auth');
Route::post('/item', 'ItemController@store')->middleware('auth');
Route::delete('/item', 'ItemController@delete')->middleware('auth');

Route::post('/take', 'TakeController@store')->middleware('auth');
Route::post('/return', 'ReturnController@store')->middleware('auth');

Route::post('/user', 'UserController@store')->middleware('auth');
Route::delete('/user', 'UserController@delete')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
