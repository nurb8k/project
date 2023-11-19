<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;


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
