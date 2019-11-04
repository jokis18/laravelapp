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

Route::post('/create', 'CustomerController@create')->middleware(['auth.shop'])->name('create');
Route::get('/view', 'CustomerController@index')->middleware(['auth.shop'])->name('view');
Route::get('/', 'ApiController@index')->middleware(['auth.shop'])->name('app');
// Route::get('/', 'CustomerController@customersCount')->middleware(['auth.shop']);
// Route::get('/', 'PagesController@pagesCount')->middleware(['auth.shop']);
// Route::get('/', 'CollectionsController@collectionCount')->middleware(['auth.shop']);

/*
|--------------------------------------------------------------------------
| Pages Export Routes
|--------------------------------------------------------------------------
*/

Route::get('/export', function () {
    return view('/export');
})->middleware(['auth.shop'])->name('export');

Route::get('/export/convert_to_CSV', 'PagesController@exportAll')->middleware(['auth.shop']);
Route::get('/export', 'PagesController@index')->middleware(['auth.shop']);
Route::get('/export/{id}', 'PagesController@export')->middleware(['auth.shop']);


/*
|--------------------------------------------------------------------------
| Pages Import Routes
|--------------------------------------------------------------------------
*/
Route::get('/import', function () {
    return view('/import');
})->middleware(['auth.shop'])->name('import');

Route::post('/importPage', 'PagesController@import')->middleware(['auth.shop'])->name('import');

/*
|--------------------------------------------------------------------------
| Colections Export Routes
|--------------------------------------------------------------------------
*/

Route::get('/collection', function () {
    return view('/collection');
})->middleware(['auth.shop'])->name('collection');

Route::get('/collection/convert_to_CSV', 'CollectionsController@exportAll')->middleware(['auth.shop']);
Route::get('/collection', 'CollectionsController@index')->middleware(['auth.shop']);
Route::get('/collection/{id}', 'CollectionsController@export')->middleware(['auth.shop']);

/*
|--------------------------------------------------------------------------
| Collections Import Routes
|--------------------------------------------------------------------------
*/
Route::get('/import_collection', function () {
    return view('/import_collection');
})->middleware(['auth.shop'])->name('import_collection');

Route::post('/import_collection', 'CollectionsController@import')->middleware(['auth.shop'])->name('import_collection');

/*
|--------------------------------------------------------------------------
| Activities Routes
|--------------------------------------------------------------------------
*/
Route::get('/activity', function () {
    return view('/activity');
})->middleware(['auth.shop'])->name('activity');

Route::get('/activity', 'ActivityController@index')->middleware(['auth.shop']);
