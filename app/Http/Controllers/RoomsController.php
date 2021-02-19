<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomsController extends Controller
{
    //
    public function checkAvailableRooms(Request $request, $client_id)
    {
        $start_date = $request->input('dateFrom');
        $end_date = $request->input('dateTo');
        $rooms = new Room();
        $clients = new Client();
        $data['dateFrom'] = $start_date;
        $data['dateTo'] = $end_date;
        $data['rooms'] = $rooms->availableRooms($data['dateFrom'], $data['dateTo'] );
        $data['client'] = $client->find($client_id);

        return view('rooms/checkAvailableRooms', $data);
    }
}
