<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    //
    public function getAvailableRooms($start_date, $end_date)
    {
        $available_rooms = DB::table('rooms as r')
                                ->select('r.id','r.name')
                                ->whereRaw("'r.id' NOT IN 
                                                    (SELECT 'b.id' FROM reservations b
                                                        WHERE   'b.date_in'> {$end_date} OR
                                                                'b.date_out' < {$start_date} 
                                                    )")
                                ->get();
        return $available_rooms;
    }
}
