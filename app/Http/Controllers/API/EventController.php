<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EventResource::collection(Event::where('event_date', '>=', now())->orderBy('id', 'desc')->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:20|unique:events,title',
            'event_date' => 'required|date|after:today',
            'reserve_deadline' => 'required|date|after:today',
            'location' => 'required|min:2',
            'price' => 'required|gte:0.01',
            'attendees' => 'required|gte:1'
        ]);

        $event = Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'organizer_id' => auth()->id ?? 1,
            'event_date' => $request->input('event_date'),
            'reserve_deadline' => $request->input('reserve_deadline'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'attendees' => $request->input('attendees'),
        ]);

        return (new EventResource($event))
                ->response()
                ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return (new EventResource($event))
                ->response()
                ->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'title' => ['sometimes', 'max:20', Rule::unique('event')->ignore($event->title(), 'title')],
            'event_date' => 'required|date|after:today',
            'reserve_deadline' => 'required|date|after:today',
            'location' => 'required|min:2',
            'price' => 'required|gte:0.01',
            'attendees' => 'required|gte:1'
        ]);
        
        $event->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'organizer_id' => auth()->id ?? 1,
            'event_date' => $request->input('event_date'),
            'reserve_deadline' => $request->input('reserve_deadline'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'attendees' => $request->input('attendees'),
        ]);

        return (new EventResource($event))
                ->response()
                ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json(null, 204);
    }
}
