<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'events',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'description' => $this->description,
                'event_date' => $this->event_date,
                'location' => $this->location,
                'price' => $this->price,
                'attendees' => $this->attendees,
                'created_at' => $this->created_at,
                'available' => $this->attendees - $this->totalReservations($this->id)
            ],
            'relationships' => [
                'organizer' => OrganizerResource::make($this->organizer())
            ],
            'links' => [
                'self' => route('events.show', $this->id),
                'related' => route('events.show', $this->title),
            ]
        ];
    }

    public function with($request) 
    {
        return [
            'status' => 'success'
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Accept', 'application/json');
    }
}
