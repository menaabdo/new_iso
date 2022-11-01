<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recordModel extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function recordModel()
    {
        return $this->hasMany(recordModelDefinition::class);
    }
}
