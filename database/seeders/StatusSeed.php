<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event_statuses = [
           1=>[
               0=>'{"kz":"menejer jauabyn kütude","ru":"Ответ менеджера"}',
               1=>'{"kz":"qabyldanbady","ru":"отказано"}',
               2=>'{"kz":"aiaqtaldy","ru":"закрыто"}',
               ],
            2 =>[
                3=>'{"kz":"tırkeluge aşyq","ru":"открыто для входа"}',
                4=>'{"kz":"tırkeluge jabyq","ru":"закрыто для входа"}',
                6=>'{"kz":"qūpia kod arqyly","ru":"через код"}',
            ],

        ];


        foreach ($event_statuses as $categoryValue => $statuses){

            foreach ($statuses as $statusId =>$statusName){
                Status::query()->create([
                    "category"=>$categoryValue,
                    "model_type"=>Event::class,
                    "model_status_id"=>$statusId,
                    "name" => json_encode(json_decode($statusName))
                ]);
            }
        }
    }
}
