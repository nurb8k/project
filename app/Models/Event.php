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
        'comment',
        'status',
        'priority',
        'user_id',
        'capacity',
        'start_time',
        'end_time',
    ];
//    protected $casts = [];
    public function getStatusObject(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status', 'model_status_id')
            ->where('statuses.model_type', self::class);
    }

    public function getStatus(): string
    {
        return $this->getStatusObject->name;
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
