<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;


class Status extends Model
{
    use HasFactory;


    protected $fillable =[
        'model_type',
        'model_status_id',
        'name',
        'category'
    ];

    public function getNameAttribute($value){
        return json_decode($value);
    }


//    public function eventStatuses(){
//
//    }

   public function getLocalizedNameAttribute(){
       $locale = App::getLocale();
         return $this->name->$locale;

   }

}
