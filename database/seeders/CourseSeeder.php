<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = \App\Models\Course::factory(10)->create();

        foreach ($courses as $course) {
            \App\Models\Image::factory(1)->create([
                'imageable_id' => $course->id,
                'imageable_type' => '\App\Models\Course',
            ]);

            \App\Models\Requirement::factory(3)->create([
                'course_id' => $course->id,
            ]);

            \App\Models\Goal::factory(3)->create([
                'course_id' => $course->id,
            ]);

            $sections = \App\Models\Section::factory(rand(3, 5))->create([
                'course_id' => $course->id,
            ]);

            foreach ($sections as $section) {
                $lessons =\App\Models\Lesson::factory(rand(3, 5))->create([
                    'section_id' => $section->id,
                ]);

                foreach ($lessons as $lesson) {
                    \App\Models\Description::factory(1)->create([
                        'lesson_id' => $lesson->id,
                    ]);
                }
            }
        }
    }
}
