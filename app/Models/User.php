<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Event;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'surname',
        'firstname',
        'username',
        'email',
        'phone',
        'password',
        'gender',
        'is_online',
        'pronouns',
        'socials',
        'bio',
        'avatar',
        'birth_date',
        'email_verified_at',
        'login_blocked_at',
        'last_seen_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
//        'gender' => 'enum'
    ];


    public function events(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Event::class, 'user_id', 'id');
    }

    public function isLoginBlocked(): bool
    {
        return $this->login_blocked_at !== null;
    }

    public function memberEvents(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasMAnyThrough(
            Event::class,
            EventMembers::class,
            'user_id', 'id', 'id', 'event_id');
    }

//    public function addresses(): \Illuminate\Database\Eloquent\Relations\MorphMany
//    {
//        return $this->morphMany(Address::class,
//            'addressable', 'addressable_type', 'addressable_id', 'id');
//    }
}
