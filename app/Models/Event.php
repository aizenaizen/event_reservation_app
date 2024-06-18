<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasOrganizer;
use App\Models\Traits\HasReservations;
use App\Models\Traits\ModelHelpers;

class Event extends Model
{
    use HasFactory;
    use HasOrganizer;
    use HasReservations;
    use ModelHelpers;

    protected $fillable = [
        'title',
        'description',
        'organizer_id',
        'event_date',
        'reserve_deadline',
        'location',
        'price',
        'attendees'
    ];
}
