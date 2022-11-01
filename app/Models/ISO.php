<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ISO extends Model
{
    use HasFactory;
    protected $guarded  = [];
    public function definition()
    {
        return $this->hasMany(IsoDefinition::class,'i_s_o_id');
    }

    public function module()
    {
        return $this->hasMany(IsoModule::class,'i_s_o_id');
    }
}
