<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Resources\ReservationCollection;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = auth()->id();
        $query = Reservation::where('reserver_id', $user_id)
                    ->orderBy('id', 'desc')
                    ->paginate($request->input('per_page', 5));
        
        return ReservationResource::collection($query);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'event_id' => 'required',
            'reserver_id' => 'required',
        ]);

        $reservation = Reservation::create([
            'event_id' => $request->input('event_id'),
            'reserver_id' => $request->input('reserver_id')
        ]);

        return (new ReservationResource($reservation))
                ->response()
                ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return (new ReservationResource($reservation))
                ->response()
                ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return response()->json(null, 204);
    }
}