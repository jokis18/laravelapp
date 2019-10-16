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
})->middleware(['auth.shop'])->name('create');

Route::get('/view', function () {
    return view('/view');
})->middleware(['auth.shop'])->name('view');

Route::get('/export', function () {
    return view('/export');
})->middleware(['auth.shop'])->name('export');

Route::post('/create', 'CustomerController@create')->middleware(['auth.shop'])->name('create');
Route::get('/view', 'CustomerController@index')->middleware(['auth.shop'])->name('view');
Route::get('/', 'ApiController@index')->middleware(['auth.shop'])->name('app');
Route::get('/export', 'PagesController@index')->middleware(['auth.shop']);
Route::get('/export/{id}', 'PagesController@export')->middleware(['auth.shop']);