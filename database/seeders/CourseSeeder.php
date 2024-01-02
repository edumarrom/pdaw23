<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Description;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Requirement;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::factory(49)->create();

        $myCourse = Course::factory()->create([
            'title' => 'Mi primer curso',
            'slug' => 'mi-primer-curso',
            'user_id' => 1,
            'category_id' => 1,
            'level_id' => 1,
            'price_id' => 1,
        ]);
        $courses->push($myCourse);

        foreach ($courses as $course) {
            Image::factory(1)->create([
                'imageable_id' => $course->id,
                'imageable_type' => 'App\Models\Course',
            ]);

            Requirement::factory(3)->create([
                'course_id' => $course->id,
            ]);

            Goal::factory(3)->create([
                'course_id' => $course->id,
            ]);

            $sections = Section::factory(rand(3, 5))->create([
                'course_id' => $course->id,
            ]);

            foreach ($sections as $section) {
                $lessons = Lesson::factory(rand(3, 5))->create([
                    'section_id' => $section->id,
                ]);

                foreach ($lessons as $lesson) {
                    Description::factory(1)->create([
                        'lesson_id' => $lesson->id,
                    ]);
                }
            }
        }
    }
}
