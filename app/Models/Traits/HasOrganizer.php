<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasOrganizer
{
    public function organizer(): User
    {
        return $this->organizerRelation;
    }
    
    public function organizerRelation(): BelongsTo
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function isOrganizedBy(User $user): bool
    {
        return $this->organizer()->matches($user);
    }

    public function organizedBy(User $organizer)
    {
        return $this->organizerRelation()->associate($organizer);
    }
}
