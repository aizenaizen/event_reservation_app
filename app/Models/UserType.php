<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    public function getTypeId($role): string 
    {
        return (string) $this->where('type', $role)->first()->id;
    }
}
