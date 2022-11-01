<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interior extends Model
{
    use HasFactory;

    protected $guarded  = [];

    public function interior()
    {
        return $this->hasMany(InteriorDefinition::class);
    }
}
