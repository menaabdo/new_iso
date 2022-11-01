<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintStudy extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function prompt()
    {
        return $this->hasMany(PromptDefinition::class);
    }
    public function causes()
    {
        return $this->hasMany(CausesDefinition::class);
    }
    public function complaint()
    {
        return $this->hasMany(ComplaintDefinition::class);
    }
}
