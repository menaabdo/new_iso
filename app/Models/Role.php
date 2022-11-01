<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(
            config('laratrust.models.permission'),
            config('laratrust.tables.permission_role'),
            'role_id',
            'permission_id'
        );
    }
}
