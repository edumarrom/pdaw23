<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Description;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Requirement;
use App\Models\Review;
use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectionTitles = [
            'Planteamiento del curso',
            'Contenido principal',
            'Últimos retoques y despedida',
        ];

        $lessonsTitles = [
            'Planteamiento de la sección',
            'Nudo de la sección',
            'Desenlace de la sección',
        ];

        $courses = Course::factory(49)->create();

        $myCourse = Course::factory()->create([
            'title' => 'Mi primer curso',
            'slug' => 'mi-primer-curso',
            'status' => 3,              // Publicado
            'user_id' => 1,             // edu@dabaliu.test
            'category_id' => 1,         // Desarrollo web
            'level_id' => 1,            // Básico
            'price_id' => 1,            // Gratis
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

            $studentsCount = 0;
            $randomMax = rand(0, 10);
            foreach (User::all() as $student) {
                $course->students()->syncWithoutDetaching($student->id);
                $studentsCount++;

                if (rand(0,1)) {
                    Review::factory(1)->create([
                        'course_id' => $course->id,
                        'user_id' => $student->id,
                    ]);
                }

                if ($studentsCount >= $randomMax) {
                    break;
                }
            }

            /* Por cada elemento de $sectionTitles crear una sección con ese titulo */
            foreach ($sectionTitles as $sectionTitle) {
                $section = Section::factory()->create([
                    'title' => $sectionTitle,
                    'course_id' => $course->id,
                ]);

                /* // Por cada sección, crear entre 3 y 5 lecciones
                $lessons = Lesson::factory(rand(3, 5))->create([
                    'section_id' => $section->id,
                ]); */

                /* Por cada elemento de $lessonTitles crear una lección con ese título */
                foreach ($lessonsTitles as $lessonTitle) {
                    $lesson = Lesson::factory()->create([
                        'title' => $lessonTitle,
                        'slug' => Str::slug($lessonTitle),
                        'section_id' => $section->id,
                    ]);

                    /* Por cada lección, crear una descripción */
                    Description::factory(1)->create([
                        'lesson_id' => $lesson->id,
                    ]);
                }
            }

            /* $sections = Section::factory(rand(3, 5))->create([
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
            } */
        }
    }
}
