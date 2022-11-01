<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeControlRequest extends Model
{
    use HasFactory;
    protected $guarded  = [];
    public function affectedDocument()
    {
        return $this->hasMany(AffectedDocumentDefinition::class);
    }
}
