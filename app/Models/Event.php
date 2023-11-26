<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected  $table = "events";

    protected  $fillable = [
        'title',
        'description',
        'short_description',
        'priority_id',
        'user_id',
        'capacity',
        'status_id',
    ];
//    protected $casts = [];
    public function getStatusObject(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'model_status_id')->where('statuses.model_type', self::class);
    }
}
