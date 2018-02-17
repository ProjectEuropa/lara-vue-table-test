<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EventNoticeController extends Controller
{

    /**
     * 
     *
     * @return 
     */
    public function index()
    {
        return view('eventnotice.index');
    }
}
