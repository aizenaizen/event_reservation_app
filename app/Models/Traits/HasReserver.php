<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasReserver
{
    public function reserver(): User
    {
        return $this->reserverRelation;
    }
    
    public function reserverRelation(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reserver_id');
    }

    public function isReservedBy(User $user): bool
    {
        return $this->resever()->matches($user);
    }

    public function reservedBy(User $reserver)
    {
        return $this->reserverRelation()->associate($reserver);
    }
}
