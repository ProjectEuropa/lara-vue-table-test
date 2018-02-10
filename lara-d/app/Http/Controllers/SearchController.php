<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{

    /**
     * 
     *
     * @return 
     */
    public function index($searchType)
    {
        return view('search.index')->with('searchType', $searchType);
    }

    /**
     * ファイルダウンロード実行Action
     * download/{id}のURLのidから指定したidのファイルをDLする
     *
     * @param  id  URL：指定したファイルのid
     * @return response DBに登録済みのバイナリデータ
     */
    public function download($id) {

        $file = DB::table('files')
                ->select('file_name', 'file_data')
                ->where('id', '=', $id)
                ->first();

        // タイトル取得
        $title = $file->file_name;
        // CHEバイナリデータ取得
        $fileData = $file->file_data;
        // 取得したバイナリデータを書き込み
        $cheData = '.CHE';
        file_put_contents($cheData, $fileData);
        $headers = array(
            'Content-Type: application/CHE',
        );
        return response()->download($cheData, $title, $headers);
    }
}
