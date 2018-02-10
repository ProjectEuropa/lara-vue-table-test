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

// 検索一覧（チーム・マッチ共用）
// 実際の検索機能はApiで実施
Route::get('/search/{searchtype}', 'SearchController@index');
// ダウンロード（チーム・マッチ共用）
Route::get('/search/download/{id}', 'SearchController@download');

Auth::routes();
