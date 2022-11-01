<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonConformanceStats extends Model
{
    use HasFactory;
    protected $guarded  = [];
    public function nonConformanceStats()
    {
        return $this->hasMany(NonConformanceStatsDefinition::class,'conformance_id');
    }
}
