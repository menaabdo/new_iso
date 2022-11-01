<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUpRecord extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function followUpRecord()
    {
        return $this->hasMany(FollowUpRecordDefinition::class);
    }
}
