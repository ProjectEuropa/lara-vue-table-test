<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->get('/search/{searchtype}', function (Request $request, $searchtype) {
    return DB::table('files')
        ->select('id', 'upload_owner_name', 'file_name', 'file_comment', 'created_at', 'upload_user_id', 'search_tag1', 'search_tag2', 'search_tag3', 'search_tag4')
        ->where('data_type', '=', '1')
        ->paginate(10);
});
