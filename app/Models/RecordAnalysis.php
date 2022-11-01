<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordAnalysis extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function recordAnalysis()
    {
        return $this->hasMany(RecordAnalysisDefinition::class,'record_analyses_id');
    }
}
