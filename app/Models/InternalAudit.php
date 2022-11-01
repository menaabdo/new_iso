<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalAudit extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function internalAudit()
    {
        return $this->hasMany(InternalAuditDefinition::class);
    }
}
