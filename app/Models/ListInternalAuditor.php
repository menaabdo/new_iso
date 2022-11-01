<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListInternalAuditor extends Model
{
    use HasFactory;
    protected $guarded  = [];
    public function list()
    {
        return $this->hasMany(ListInternalAuditorDefinition::class,'list_auditor_id');
    }
}
