<?php

namespace App\Models\Traits;

use App\Models\Reservation;

trait HasReservations
{
    public function getReservations($event_id)
    {
        return Reservation::where('event_id', $event_id)->get();
    }

    public function totalReservations($event_id)
    {
        return Reservation::where('event_id', $event_id)->count();
    }
}