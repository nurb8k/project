<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event_statuses = [
            1 => [
                1 => ['kz' => 'menejer jauabyn kütude', 'ru' => 'ожидает ответа менеджера'],
                2 => ['kz' => 'qabyldanbady', 'ru' => 'не принято'],
                3 => ['kz' => 'qabyldandy', 'ru' => 'принято'],
            ],
            2 => [
                4 => ['kz' => 'tırkeluge aşyq', 'ru' => 'открыто для входа'],
                5 => ['kz' => 'tırkeluge jabyq', 'ru' => 'закрыто для входа'],
                6 => ['kz' => 'qūpia kod arqyly', 'ru' => 'через код'],
            ],

        ];


        foreach ($event_statuses as $categoryValue => $statuses) {

            foreach ($statuses as $statusId => $statusName) {
                Status::query()->create([
                    "category" => $categoryValue,
                    "model_type" => Event::class,
                    "model_status_id" => $statusId,
                    "name" => $statusName,
                ]);
            }
        }
    }
}
