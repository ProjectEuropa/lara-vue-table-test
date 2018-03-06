<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\BusinessService\FileService;

class SumdownloadController extends Controller
{

    private $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    /**
     * 
     *
     * @return 
     */
    public function index($searchType)
    {
        return view('sumdl.index')->with('searchType', $searchType);
    }


}
