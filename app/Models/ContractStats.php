<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractStats extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function contractStats()
    {
        return $this->hasMany(ContractStatsDefinition::class);
    }
}
