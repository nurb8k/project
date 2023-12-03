<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    private array $categories = [
        [
            'id' => 1,
            'name' => '{"kz": "Спорт", "ru": "Спорт", "en": "Sport"}',
            'slug' => 'sport',
            'parent_id' => null
        ],
        [
            'id' => 2,
            'name' => '{"kz": "Футбол", "ru": "Футбол", "en": "football"}',
            'slug' => 'football',
            'parent_id' => 1
        ],
        [
            'id' => 3,
            'name' => '{"kz": "волейбол", "ru": "волейбол", "en": "volleyball"}',
            'slug' => 'volleyball',
            'parent_id' => 1
        ],
        [
            'id' => 4,
            'name' => '{"kz": "Туризм", "ru": "Туризм", "en": "Tour"}',
            'slug' => 'tour',
            'parent_id' => null
        ],
    ];

    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::query()->create([
                'id' => $category['id'],
                'name' => $category['name'],
                'slug' => $category['slug'],
                'parent_id' => $category['parent_id'],
            ]);
        }
    }
}
