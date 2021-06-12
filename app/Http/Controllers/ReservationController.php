<?php

namespace App\Http\Controllers;

use App\Models\GuestReservation;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserver(Request $request)
    {
        // $request['date_reservation'] = Carbon::createFromFormat('m/d/Y', $request->date_reservation)->format('d-m-Y');

        $reservation = new Reservation;
        $reservation->voyage_id = $request['voyage_id'];
        $reservation->user_id = $request['user_id'];
        $reservation->nombre_de_passagers = $request['nombre_de_passagers'];
        $reservation->date_reservation = $request['date_reservation'];



        $reservation->save();
    }

    public function reserverGuest(Request $request)
    {
        // $request['date_reservation'] = Carbon::createFromFormat('m/d/Y', $request->date_reservation)->format('d-m-Y');

        $reservation = new GuestReservation();
        $reservation->voyage_id = $request['voyage_id'];
        $reservation->guest_id = $request['guest_id'];
        $reservation->nombre_de_passagers = $request['nombre_de_passagers'];
        $reservation->date_reservation = $request['date_reservation'];
        $reservation->save();
    }
}
