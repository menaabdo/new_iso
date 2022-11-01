<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoDefinition extends Model
{
    use HasFactory;
    protected $fillable = ['definition','term','i_s_o_id'];
}
