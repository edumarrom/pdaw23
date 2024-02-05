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
        $myCourse = [
            [
                'title' => 'Aprende Laravel desde cero',
                'subtitle' => 'Crea apps con un framework excelente, usando tecnologías como Livewire, TailwindCSS, AlpineJS y más',
                'description' => 'En este curso aprenderás a trabajar con el framework PHP Laravel 10 desde cero, cuando termines el curso podrás crear aplicaciones en este framework básicas y no tan básicas de manera fluida. Tendrás una idea clara de cómo atacar cualquier proyecto para el consumo y gestión de contenido por Internet, desarrollar los componentes fundamentales de una aplicación tipo Blog en PHP.',
                'level_id' => 1,            // Básico
                'category_id' => 1,         // Desarrollo web
                'price_id' => 1,            // Gratis
            ],
        ];

        $courses = [
            [
                'title' => 'Introducción al Desarrollo Web',
                'subtitle' => 'Construye tu base en el desarrollo web con HTML, CSS y JavaScript.',
                'description' => 'Descubre los fundamentos del desarrollo web mientras creas proyectos prácticos. Aprende a estructurar contenido con HTML, dar estilo con CSS y agregar interactividad con JavaScript.',
                'level_id' => 1,            // Básico
                'category_id' => 1,         // Desarrollo web
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Diseño de Interfaces Avanzado',
                'subtitle' => 'Perfecciona tus habilidades de diseño para crear experiencias de usuario sorprendentes.',
                'description' => 'Avanza en el diseño centrado en el usuario. Aprende técnicas avanzadas de prototipado, diseño de interacción y principios de usabilidad. Domina herramientas como Figma y obtén una perspectiva sólida sobre las tendencias actuales en UI/UX.',
                'level_id' => 2,            // Intermedio
                'category_id' => 2,         // Diseño gráfico
                'price_id' => 3,            // Intermedio
            ],
            [
                'title' => 'Introducción al SEO y Marketing Digital',
                'subtitle' => 'Descubre los fundamentos del SEO y posiciona tu contenido en los motores de búsqueda.',
                'description' => 'Aprende los conceptos básicos del SEO y cómo aplicar estrategias efectivas para mejorar la visibilidad de tu sitio web en los motores de búsqueda. Explora técnicas de optimización de contenido, palabras clave y análisis de datos para impulsar el tráfico orgánico.',
                'level_id' => 1,            // Básico
                'category_id' => 5,         // Marketing Digital
                'price_id' => 2,            // Básico
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

        $comments = [
            'Muy buena explicación, me ha gustado mucho. Gracias!',
            'No os parece que el profesor habla demasiado rápido?',
            'No me ha gustado nada, el contenido está obsoleto.',
            'Tienes algun enlace para poder buscar más información?',
            'Me da error, ¿alguien más tiene este problema?',
            'El tiempo pasa... volando, pero no me entero de nada.',
        ];

        $teachers = DB::table('model_has_roles')->where('role_id', 2)->pluck('model_id')->toArray();

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
                'price_id' => 1,
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

            // Matricular estudiantes en el curso
            if ($course->status == 3) {
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

            // Crear 3 secciones por cada curso
            for ($i = 0; $i < 3; $i++) {
                $section = Section::create([
                    'title' => $sections[$i],
                    'course_id' => $course->id,
                ]);

                // Crear 3 lecciones por cada sección
                for ($j = 0; $j < 3; $j++) {
                    $video = fake()->randomElement($videos);
                    $lesson = Lesson::create([
                        'title' => $lessons[$i][$j],
                        'slug' => Str::slug($lessons[$i][$j]) . '-' . $section->id,
                        'path' => $video['path'],
                        'iframe' => $video['iframe'],
                        'platform_id' => $video['platform_id'],
                        'section_id' => $section->id,
                    ]);

                    // Insertar comentarios en las lecciones
                    if ($course->status === 3) {
                        $students = $course->students;
                        if ($students->count()) {
                        if (fake()->randomElement([0, 0, 0, 0, 0, 1])) {
                                $student = fake()->randomElement($students);
                                $lesson->comments()->create([
                                    'body' => fake()->randomElement($comments),
                                    'user_id' => $student->id,
                                ]);
                            }
                        }
                    }
                }
            }
        }
    }
}
