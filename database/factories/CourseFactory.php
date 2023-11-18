<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();

        return [
            'title' => $title,
            'subtitle' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement([1, 2, 3]), // 1 = Borrador,  2 = Revision, 3 = Publicado
            'slug' => Str::slug($title),
            'user_id' => rand(1, 100),
            'level_id' => rand(1, 3),
            'category_id' => rand(1, 3),
            'price_id' => rand(1, 3),
        ];
    }
}
