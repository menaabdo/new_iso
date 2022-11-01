<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestedPartie extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function interestedPartie()
    {
        return $this->hasMany(InterestedPartieDefinition::class);
    }
}
