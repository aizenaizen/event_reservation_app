<?php

namespace App\Models\Traits;

use App\Models\Event;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasEvent
{
    public function reservedEvent(): Event
    {
        return $this->reservedEventRelation;
    }
    
    public function reservedEventRelation(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
