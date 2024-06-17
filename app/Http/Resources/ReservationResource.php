<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'reservations',
            'id' => $this->id,
            'event_id' => $this->event_id,
            'relationships' => [
                'reserved' => EventResource::make($this->reservedEvent()),
                'reserver' => ReserverResource::make($this->reserver()),
            ],
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