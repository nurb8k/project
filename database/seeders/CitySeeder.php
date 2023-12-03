<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    private array $cities = [
        //add cities here with slug and name in different languages
        'almaty' => '{"kz":"Алматы","ru": "Алмата","en":"Almaty"}',
        'astana' => '{"kz":"Астана","ru": "Астана","en":"Astana"}',
        'aqtau' => '{"kz":"Ақтау","ru": "Актау","en":"Aktau"}',
        'aqtobe' => '{"kz":"Ақтобе","ru": "Актобе","en":"Aktobe"}',
        'atyrau' => '{"kz":"Атырау","ru": "Атырау","en":"Atyrau"}',
        'qaragandy' => '{"kz":"Қарағанды","ru": "Караганда","en":"Karaganda"}',
        'kokshetau' => '{"kz":"Көкшетау","ru": "Кокшетау","en":"Kokshetau"}',
        'qostanai' => '{"kz":"Қостанай","ru": "Костанай","en":"Kostanay"}',
        'qyzylorda' => '{"kz":"Қызылорда","ru": "Кызылорда","en":"Kyzylorda"}',
        'pavlodar' => '{"kz":"Павлодар","ru": "Павлодар","en":"Pavlodar"}',
        'petropavl' => '{"kz":"Петропавл","ru": "Петропавл","en":"Petropavl"}',
        'semey' => '{"kz":"Семей","ru": "Семей","en":"Semey"}',
        'taldyqorgan' => '{"kz":"Талдықорған","ru": "Талдыкорган","en":"Taldykorgan"}',
        'taraz' => '{"kz":"Тараз","ru": "Тараз","en":"Taraz"}',
        'turkestan' => '{"kz":"Түркістан","ru": "Туркестан","en":"Turkestan"}',
        'shymkent' => '{"kz":"Шымкент","ru": "Шымкент","en":"Shymkent"}',

    ];
    public function run(): void
    {
        foreach ($this->cities as $slug => $name) {
            City::query()->create([
                'name' => $name,
                'slug' => $slug,
            ]);
        }
    }
}
