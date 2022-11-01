<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function risk()
    {
        return $this->hasMany(RiskDefinition::class);
    }
}
