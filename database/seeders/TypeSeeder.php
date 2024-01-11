<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
//            ["name" =>["en"=> "double", "kz"=>"жұптық" , "ru"=>"парный"], "code"=>"double"],
            ["name" => [ "en"=> "private", "kz"=>"приват" , "ru"=>"приватный"], "code"=>"private"],
            ["name" =>["en"=> "team", "kz"=>"ашық" , "ru"=>"командный" ], "code"=>"team"],

        ];

        foreach ($types as $type) {
            \App\Models\Type::query()->create(
                [
                    "name" => $type["name"],
                    "code" => $type["code"],
                ]
            );
        }
    }
}
