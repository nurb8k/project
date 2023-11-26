<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Status extends Model
{
    use HasFactory, HasTranslations;


    public $translatable = ['name'];

    protected $fillable =[
        'model_type',
        'model_status_id',
        'name',
        'category'
    ];


//    public function eventStatuses(){
//
//    }


}
