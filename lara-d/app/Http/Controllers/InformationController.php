<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\BusinessService\EventService;

class InformationController extends Controller
{

    private $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * 
     *
     * @return 
     */
    public function index()
    {
        $events = $this->eventService->searchAllEvents();

        return view('information.index')->with('events', $events);
    }
}
