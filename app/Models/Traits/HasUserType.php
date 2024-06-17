<?php

namespace App\Models\Traits;

use App\Models\UserType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasUserType
{
    public function userType(): UserType
    {
        return $this->userTypeRelation;
    }
    
    public function userTypeRelation(): BelongsTo
    {
        return $this->belongsTo(UserType::class, 'user_type_id');
    }
}
