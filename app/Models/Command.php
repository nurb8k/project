<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Command extends Model
{
    use HasFactory;

    // $table->string('name')->comment('название команды');
    //            $table->string('description')->nullable()->comment('описание команды');
    //            $table->unsignedInteger('capacity')->comment('вместимость команды');
    //            $table->foreignId('event_id')
    //                ->constrained('events')
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'event_id',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function members(){
        return $this->hasMany(EventMembers::class, 'command_id', 'id');
    }
}
