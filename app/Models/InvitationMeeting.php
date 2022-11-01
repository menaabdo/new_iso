<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitationMeeting extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function invetationMeeting()
    {
        return $this->hasMany(InvitationMeetingDefinition::class);
    }
}
