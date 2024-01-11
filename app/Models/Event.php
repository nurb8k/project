<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'is_private',
        'is_commendable',
        'key',
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
    public function types(): BelongsToMany
    {
        return $this->belongsToMany(
            Type::class,
            'events_types', 'event_id', 'type_id');
    }


    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'events_categories', 'event_id', 'category_id');
    }

    public function category(){
        return $this->categories()->first();
    }

    public function type()
    {
        return $this->types()->first();
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable', 'addressable_type', 'addressable_id');
    }

    public function commands() :HasMany
    {
        return $this->hasMany(Command::class, 'event_id', 'id');
    }

}
