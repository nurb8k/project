<?php

namespace Database\Factories;

use App\Models as Models;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text,
            'description' => fake()->text,
            'short_description' => fake()->text,
//            'priority_id' => Models\Priority::all()->random()->id,
            'status' => Models\Status::all()->where('model_type','App\Models\Event')->random()->id,
            'user_id' => Models\User::factory(),
            'capacity' => fake()->numberBetween(1, 100),
            'start_time' => now(),
            'end_time' => now()->addDays(15),
        ];
    }
}
