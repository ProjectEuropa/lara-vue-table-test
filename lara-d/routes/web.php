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
Route::get('/upload', function () {
    return view('upload.index');
});
Route::post('/team/simpleupload', 'UploadController@teamSimpleUpload');
Route::post('/team/upload', 'UploadController@teamUpload');
Route::post('/match/simpleupload', 'UploadController@matchSimpleUpload');
Route::post('/match/upload', 'UploadController@matchUpload');

// 検索一覧（チーム・マッチ共用）
// 実際の検索機能はApiで実施
Route::get('/search/{searchType}', 'SearchController@index');
// ダウンロード（チーム・マッチ共用）
Route::get('/search/download/{id}', 'SearchController@download');
// 削除（チーム・マッチ共用）
Route::delete('/search/{searchType}/delete', 'SearchController@delete');
//インフォメーション
Route::get('/information', 'InformationController@index');

Route::group(['middliware' => 'auth'], function() {
    //イベント告知
    Route::get('/eventnotice', 'EventNoticeController@index');
    Route::post('/eventnotice', 'EventNoticeController@register');
    // マイページ
    Route::get('/mypage', 'MypageController@index');
    //マイページ・ファイル削除
    Route::delete('/mypage/file/delete', 'MypageController@fileDelete');
    //マイページ・イベント削除
    Route::delete('/mypage/event/delete', 'MypageController@eventDelete');
    //マイページ・ユーザ情報編集
    Route::post('/mypage/edituserinfo', 'MypageController@editUserInfo');
});



Auth::routes();
