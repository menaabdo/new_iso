<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectorList extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function directorList()
    {
        return $this->hasMany(DirectorListDefinition::class);
    }
}
