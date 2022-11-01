<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonConformanceReport extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function nonConformanceReport()
    {
        return $this->hasMany(NonConformanceReportDefinition::class,'conformance_report_id');
    }
}
