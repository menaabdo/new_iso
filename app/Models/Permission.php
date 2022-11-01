<?php

namespace App\Models;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(
            config('laratrust.models.role'),
            config('laratrust.tables.permission_role'),
            'role_id',
            'permission_id'
        );
    }
}
