<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory
        ,
//        ;
        HasTranslations;

    public array $translatable = ['name'];
    protected $fillable = [
        'name',
        'parent_id',
        'slug',
    ];
    protected $casts = [];
}
