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
Route::get('/product/{product}', 'ProductController@show')->middleware('verified');
Route::post('/product', 'ProductController@store')->middleware('verified');
Route::patch('/product', 'ProductController@patch')->middleware('verified');
Route::delete('/product', 'ProductController@delete')->middleware('verified');

Route::get('/item', 'ItemController@index')->middleware('verified');
Route::get('/item/{item}', 'ItemController@show')->middleware('verified');
Route::post('/item', 'ItemController@store')->middleware('verified');
Route::patch('/item', 'ItemController@patch')->middleware('verified');
Route::delete('/item', 'ItemController@delete')->middleware('verified');

Route::post('/take', 'TakeController@store')->middleware('verified');
Route::delete('/take', 'TakeController@delete')->middleware('verified');

Route::post('/alert', 'AlertController@store')->middleware('verified');
Route::delete('/alert', 'AlertController@delete')->middleware('verified');

Route::post('/user', 'UserController@store')->middleware('verified');
Route::delete('/user', 'UserController@delete')->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
