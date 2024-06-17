<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = $this->merge(Arr::except(parent::toArray($request), [
            'updated_at', 'email_verified_at'
        ]));
        return [
            $data,
            'user_type' => $this->userType()
        ];
    }
}
