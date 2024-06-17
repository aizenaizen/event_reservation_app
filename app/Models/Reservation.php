<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasReserver;
use App\Models\Traits\HasEvent;
use App\Models\Traits\ModelHelpers;

class Reservation extends Model
{
    use HasFactory;
    use HasEvent;
    use HasReserver;
    use ModelHelpers;

    protected $fillable = [
        'event_id',
        'reserver_id',
    ];
}
