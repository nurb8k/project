<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Status extends Model
{
    use HasFactory
//        ;
    ,
        HasTranslations;


    public array $translatable = ['name'];

    protected $fillable =[
        'model_type',
        'model_status_id',
        'name',
        'category'
    ];


    public function getStatusStyle(): string
    {
        if ($this->name === 'qabyldanbady' || $this->name === 'отказано') {
            return 'bg-label-danger';
        }elseif ($this->name == 'menejer jauabyn kütude' || $this->name == 'Ответ менеджера') {
            return 'bg-label-warning';
    }elseif ($this->name == 'aiaqtaldy' || $this->name == 'закрыто') {
            return 'bg-label-danger';
        }elseif ($this->name == 'tırkeluge aşyq' || $this->name == 'открыто для входа') {
            return 'bg-label-info';
        }elseif ($this->name == 'tırkeluge jabyq' || $this->name == 'закрыто для входа') {
            return 'bg-label-secondary';
        }elseif ($this->name == 'qūpia kod arqyly' || $this->name == 'через код') {
            return 'bg-label-primary';
        }
        return 'bg-label-primary';
    }
//    public function eventStatuses(){
//
//    }


}
