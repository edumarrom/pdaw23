<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
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
            'slug' => Str::slug($title),
            'path' => 'https://youtu.be/I1Mzx_tSpew',
            'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/I1Mzx_tSpew?si=F1rFit69ZhTjpfax" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
            'platform_id' => 1, // Youtube
        ];
    }
}
