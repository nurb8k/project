<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventMembers extends Model
{
    use HasFactory;

    protected $fillable = ['status',
        'event_id',
        'user_id',
        'command_id',
    ];
    protected $casts = [];
}
