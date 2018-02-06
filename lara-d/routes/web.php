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
Route::get('/simpleupload', function () {
    return view('upload.index');
});
Route::get('/search/{searchtype}', function ($searchtype) {
    return view('search.index')->with('searchtype', $searchtype);
});


Auth::routes();
