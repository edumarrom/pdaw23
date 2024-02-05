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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Aprende Laravel desde cero',
                'subtitle' => 'El mejor curso de Laravel',
                'description' => 'Aprende Laravel desde cero, con las mejores prácticas y con ejemplos reales.',
                'level_id' => 1,            // Básico
                'category_id' => 1,         // Desarrollo web
                'price_id' => 1,            // Gratis
            ],
        ];

        $requirements = [
            'Conocimientos previos de ...',
            'Experiencia previa con ...',
            'Disponer de ciertas ...'
        ];

        $goals = [
            'Comprender los fundamentos de...',
            'Dominar los aspectos de ...',
            'Desarrollar una aplicación con ...',
        ];

        $sections = [
            'Planteamiento del curso',
            'Contenido principal',
            'Últimos retoques y despedida',
        ];

        $lessons = [
            [
                'Presentación del curso',
                'Materiales necesarios',
                'Preparando el entorno de trabajo',
            ],
            [
                'Fundamentos básicos',
                'Contenidos principales',
                'Profundizando en los conceptos'
            ],
            [
                'Problemas frecuentes',
                'Revisión final',
                'Despedida y agradecimientos'
            ],
        ];

        $videos = [
            [
                'path' => 'https://youtu.be/FUKmyRLOlAA',
                'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/FUKmyRLOlAA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                'platform_id' => 1,
            ],
            [
                'path' => 'https://vimeo.com/110778582',
                'iframe' => '<iframe src="https://player.vimeo.com/video/110778582" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>',
                'platform_id' => 2,
            ],
        ];

        $reviews = [
            [
                'rating' => 5,
                'comment' => 'Excelente curso, muy completo y bien explicado.',
            ],
            [
                'rating' => 4,
                'comment' => 'Buen curso, aunque esperaba algo más.',
            ],
            [
                'rating' => 3,
                'comment' => 'Regular, no me ha gustado mucho.',
            ],
            [
                'rating' => 2,
                'comment' => 'No lo recomendaría, no me ha aportado nada.',
            ],
            [
                'rating' => 1,
                'comment' => 'Pésimo, no lo recomendaría a nadie.',
            ],
        ];

        /* Crear un curso por cada elemento dentro del array $courses */
        foreach ($courses as $item) {
            $course = Course::create([
                'title' => $item['title'],
                'subtitle' => $item['subtitle'],
                'description' => $item['description'],
                'slug' => Str::slug($item['title']),
                'status' => 3,
                'user_id' => 1,
                'level_id' => $item['level_id'],
                'category_id' => $item['category_id'],
                'price_id' => $item['price_id'],
            ]);

            // Crear 1 imagen por cada curso
            Image::create([
                'path' => "courses/$course->slug.jpg",
                'imageable_id' => $course->id,
                'imageable_type' => Course::class,
            ]);

            // Crear 3 requisitos por cada curso
            foreach ($requirements as $requirement) {
                Requirement::create([
                    'name' => $requirement,
                    'course_id' => $course->id,
                ]);
            }

            // Crear 3 metas por cada curso
            foreach ($goals as $goal) {
                Goal::create([
                    'name' => $goal,
                    'course_id' => $course->id,
                ]);
            }

            // Crear 3 secciones por cada curso
            foreach ($sections as $item) {
                $section = Section::create([
                    'title' => $item,
                    'course_id' => $course->id,
                ]);

                // Crear 3 lecciones por cada sección
                for ($i = 0; $i < 3; $i++) {
                    $video = fake()->randomElement($videos);
                    Lesson::create([
                        'title' => $lessons[$section->id - 1][$i],
                        'slug' => Str::slug($lessons[$section->id - 1][$i]),
                        'path' => $video['path'],
                        'iframe' => $video['iframe'],
                        'platform_id' => $video['platform_id'],
                        'section_id' => $section->id,
                    ]);
                }
            }

            // Matricular estudiantes en el curso
            if ($course->status === 3) {
                $studentsCount = 0;
                $randomMax = rand(0, 10);
                foreach (User::all() as $student) {
                    if(fake()->randomElement([0, 0, 1])) {
                        $course->students()->attach($student->id);
                        $studentsCount++;
                        if (fake()->randomElement([0, 0, 1])) {
                            $review = fake()->randomElement($reviews);
                            Review::create([
                                'course_id' => $course->id,
                                'user_id' => $student->id,
                                'rating' => $review['rating'],
                                'comment' => $review['comment'],
                            ]);
                        }
                    }

                    if ($studentsCount >= $randomMax) {
                        break;
                    }
                }
            }
        }
    }
}
