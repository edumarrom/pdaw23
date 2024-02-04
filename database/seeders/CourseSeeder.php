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
        $cursos = [
            [
                'title' => 'Aprende Laravel desde cero',
                'subtitle' => 'El mejor curso de Laravel',
                'description' => 'Aprende Laravel desde cero, con las mejores prácticas y con ejemplos reales.',
                'slug' => 'aprende-laravel-desde-cero',
                'status' => 3,              // Publicado
                'user_id' => 1,             // edu@dabaliu.test
                'level_id' => 1,            // Básico
                'category_id' => 1,         // Desarrollo web
                'price_id' => 1,            // Gratis
            ],
        ];

        $imagenes = [
            'courses/aprende-laravel-desde-cero.jpg',
        ];

        $requisitos = [
            'Conocimientos previos de ...',
            'Experiencia previa con ...',
            'Disponer de ciertas ...'
        ];

        $metas = [
            'Comprender los fundamentos de...',
            'Dominar los aspectos de ...',
            'Desarrollar una aplicación con ...',
        ];

        $secciones = [
            'Planteamiento del curso',
            'Contenido principal',
            'Últimos retoques y despedida',
        ];

        $lecciones = [
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

        $valoraciones = [
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

        /* Crear un curso por cada elemento dentro del array $cursos */
        foreach ($cursos as $item) {
            $curso = Course::create($item);

            // Crear 1 imagen por cada curso
            Image::create([
                'path' => $imagenes[$curso->id - 1],
                'imageable_id' => $curso->id,
                'imageable_type' => Course::class,
            ]);

            // Crear 3 requisitos por cada curso
            foreach ($requisitos as $requisito) {
                Requirement::create([
                    'name' => $requisito,
                    'course_id' => $curso->id,
                ]);
            }

            // Crear 3 metas por cada curso
            foreach ($metas as $meta) {
                Goal::create([
                    'name' => $meta,
                    'course_id' => $curso->id,
                ]);
            }

            // Crear 3 secciones por cada curso
            foreach ($secciones as $item) {
                $seccion = Section::create([
                    'title' => $item,
                    'course_id' => $curso->id,
                ]);

                // Crear 3 lecciones por cada sección
                for ($i = 0; $i < 3; $i++) {
                    Lesson::create([
                        'title' => $lecciones[$seccion->id - 1][$i],
                        'slug' => Str::slug($lecciones[$seccion->id - 1][$i]),
                        'path' => 'https://youtu.be/FUKmyRLOlAA',
                        'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/FUKmyRLOlAA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                        'platform_id' => 1,
                        'section_id' => $seccion->id,
                    ]);
                }
            }

            // Matricular estudiantes en el curso
            if ($curso->status === 3) {
                $studentsCount = 0;
                $randomMax = rand(0, 10);
                foreach (User::all() as $student) {
                    if(fake()->randomElement([0, 0, 1])) {
                        $curso->students()->attach($student->id);
                        $studentsCount++;
                        if (fake()->randomElement([0, 0, 1])) {
                            $valoracion = fake()->randomElement($valoraciones);
                            Review::create([
                                'course_id' => $curso->id,
                                'user_id' => $student->id,
                                'rating' => $valoracion['rating'],
                                'comment' => $valoracion['comment'],
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
