<?php
namespace App\BusinessService;

use Illuminate\Http\Request;
use DB;

/*
 * EventServieクラス
 * Eventモデルに関わるロジックを記述
 */
class EventService {

    /**
     *
     * イベント全件検索
     * @return Event
     */
    public function searchAllEvents() {
        return DB::table('events')->select('id', 'event_name', 'event_details', 'event_reference_url', 'event_type', DB::raw("to_char(event_closing_day, 'YYYY/MM/DD (TMDy) HH24:MI') as event_closing_day, "
                                . "to_char(event_displaying_day, 'YYYY/MM/DD (TMDy) HH24:MI') as event_displaying_day "))
                ->get();
    }
}