<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
//    protected $fillable = [
//        'user_id',
//        'address',
//        'city',
//        'state',
//        'country',
//        'pin code',
//        'phone',
//        'is_default',
//    ];

public function addressable(): \Illuminate\Database\Eloquent\Relations\MorphTo
{
    return $this->morphTo('addressable');
}
}
