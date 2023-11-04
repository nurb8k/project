<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title',
        'description',
        'short_description',
        'status_id',
        'priority_id',
        'user_id',
        'capacity'];
    protected $casts = [];
}
