<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recordCanceledDocument extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function recordCanceledDocument()
    {
        return $this->hasMany(recordCanceledDocumentDefinition::class,'document_id');
    }
}
