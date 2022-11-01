<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowLog extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function follow()
    {
        return $this->hasMany(FollowLogDefinition::class);
    }
}
