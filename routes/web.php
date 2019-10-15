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
    return view('app');
})->middleware(['auth.shop'])->name('home');

Route::get('/create', function () {
    return view('/create');
})->middleware(['auth.shop']);


Route::post('/customer', 'CustomerController@create')->middleware(['auth.shop'])->name('customer.create');
// Route::get('/', 'CustomerController@create')->middleware(['auth.shop']);
// Route::get('/', 'CustomerController@index')->middleware(['auth.shop']);