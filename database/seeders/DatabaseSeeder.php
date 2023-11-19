<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);

        $this->call(CategorySeeder::class);

        $this->call(LevelSeeder::class);

        $this->call(PriceSeeder::class);

        $courses = \App\Models\Course::factory(50)->create();

        foreach ($courses as $course) {
            \App\Models\Image::create([
                'imageable_id' => $course->id,
                'imageable_type' => \App\Models\Course::class,
                'path' => fake()->imageUrl(640, 360),
            ]);

            \App\Models\Audience::factory(1)->create([
                'course_id' => $course->id,
            ]);

            \App\Models\Requirement::factory(3)->create([
                'course_id' => $course->id,
            ]);

            \App\Models\Goal::factory(3)->create([
                'course_id' => $course->id,
            ]);

            \App\Models\Section::factory(rand(5, 10))->create([
                'course_id' => $course->id,
            ]);
        }
    }
}
