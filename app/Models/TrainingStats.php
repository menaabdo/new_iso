<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingStats extends Model
{
    use HasFactory;
    protected $guarded  = [];
    public function trainingStats()
    {
        return $this->hasMany(TrainingStatsDefinition::class);
    }
}
