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
            'name' => '{"kz": "Oyın-sauıq", "ru": "Развлечение", "en": "Entertainment"}',
            'slug' => 'entertainment',
            'parent_id' => null
        ],
        [
            'id' => 3,
            'name' => '{"kz": "Кездесу", "ru": "Встреча", "en": "Meeting"}',
            'slug' => 'meeting',
            'parent_id' => null
        ],
        [
            'id' => 4,
            'name' => '{"kz": "Туризм", "ru": "Туризм", "en": "Tour"}',
            'slug' => 'tour',
            'parent_id' => null
        ],
        [
            'id' => 5,
            'name' => '{"kz": "Басқа", "ru": "Другое", "en": "Other"}',
            'slug' => 'other',
            'parent_id' => null
        ],
        [
            'id' => 6,
            'name' => '{"kz": "Жұптық кездесу", "ru": "Парный встреча", "en": "Double meeting"}',
            'slug' => 'double_meeting',
            'parent_id' => 3
        ],
        [
            'id' => 7,
            'name' => '{"kz": "Топтық кездесу", "ru": "Командная встреча", "en": "Team meeting"}',
            'slug' => 'team_meeting',
            'parent_id' => 3
        ],

        [
            'id' => 8,
            'name' => '{"kz": "Футбол", "ru": "Футбол", "en": "football"}',
            'slug' => 'football',
            'parent_id' => 1
        ],
        [
            'id' => 9,
            'name' => '{"kz": "волейбол", "ru": "волейбол", "en": "volleyball"}',
            'slug' => 'volleyball',
            'parent_id' => 1
        ],


    ];

    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::query()->create([
                'id' => $category['id'],
                'name' => json_decode($category['name'], true),
                'slug' => $category['slug'],
                'parent_id' => $category['parent_id'],
            ]);
        }
    }
}
