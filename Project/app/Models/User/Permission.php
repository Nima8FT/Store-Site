<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use User\Role;

class Permission extends Model
{
    use HasFactory;

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }
}
