<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUpRecordImprovement extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function followUpRecord()
    {
        return $this->hasMany(FollowUpRecordImprovementDefinition::class,'follow_up_id');
    }
}
