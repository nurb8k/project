<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $fillable = [
        'city_id',
        'addressable_id',
        'addressable_type',
        'street',
        'city_district',
        'house_number',
        'amenity',
        'building',
        'suburb',
        '_coordinates',
        '_address_type',
        '_info',
        'description',

   ];

public function addressable(): \Illuminate\Database\Eloquent\Relations\MorphTo
{
    return $this->morphTo('addressable');
}
}
