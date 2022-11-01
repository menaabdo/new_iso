<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recordAction extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function recordAction()
    {
        return $this->hasMany(recordActionDefinition::class);
    }
}
