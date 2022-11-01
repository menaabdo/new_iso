<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrokenRecord extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function brokenRecord()
    {
        return $this->hasMany(BrokenRecordDefinition::class);
    }
}
