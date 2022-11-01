<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stripe\Service\TopupService;

class MeetingAgenda extends Model
{
    use HasFactory;
    protected $guarded  = [];
    public function attendance()
    {
        return $this->hasMany(MeetingAgendaDefinition::class);
    }

    public function topic()
    {
        return $this->hasMany(TopicDefinition::class);
    }
}
