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

Route::get('/product/{id}', function () {
    $productID = DB::table('product')->find($id);
    return view('product', compact['productID']);
});

Route::get('/item/{id}', function () {
    return view('item');
});