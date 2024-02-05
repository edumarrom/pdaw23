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
                'subtitle' => 'Crea apps con un framework excelente, usando tecnologías como Livewire, TailwindCSS, AlpineJS y más',
                'description' => 'En este curso aprenderás a trabajar con el framework PHP Laravel 10 desde cero, cuando termines el curso podrás crear aplicaciones en este framework básicas y no tan básicas de manera fluida. Tendrás una idea clara de cómo atacar cualquier proyecto para el consumo y gestión de contenido por Internet, desarrollar los componentes fundamentales de una aplicación tipo Blog en PHP.',
                'level_id' => 1,            // Básico
                'category_id' => 1,         // Desarrollo web
                'price_id' => 1,            // Gratis
            ],
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
                'category_id' => 2,         // Diseño web
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
            [
                'title' => 'Dominando CSS Intermedio',
                'subtitle' => 'Avanza en tus habilidades de diseño web con CSS más avanzado y técnicas modernas.',
                'description' => 'Este curso te llevará más allá de los conceptos básicos de CSS. Aprenderás a utilizar flexbox y grid para diseñar maquetas complejas, a implementar animaciones y transiciones para mejorar la interactividad, y a aplicar estilos responsivos para adaptar tu diseño a diferentes dispositivos.',
                'level_id' => 2,            // Intermedio
                'category_id' => 1,         // Desarrollo web
                'price_id' => 3,            // Intermedio
            ],
            [
                'title' => 'Introducción al Keyword Research',
                'subtitle' => 'Descubre cómo encontrar las palabras clave adecuadas para mejorar el SEO de tu sitio web.',
                'description' => 'En este curso aprenderás los fundamentos del Keyword Research. Descubrirás cómo identificar palabras clave relevantes para tu nicho, cómo analizar la competencia y cómo utilizar herramientas como Google Keyword Planner para obtener datos clave. Al final del curso, estarás listo para iniciar tu estrategia de SEO con un enfoque sólido en palabras clave.',
                'level_id' => 1,            // Básico
                'category_id' => 5,         // Marketing Digital
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Introducción a la Psicología del Color',
                'subtitle' => 'Descubre cómo los colores afectan nuestras emociones y percepciones en el diseño.',
                'description' => 'En este curso exploraremos el fascinante mundo de la psicología del color. Aprenderás cómo diferentes colores pueden influir en el estado de ánimo y el comportamiento de las personas, y cómo utilizar esta información para diseñar de manera efectiva. Descubrirás consejos prácticos sobre cómo elegir colores para transmitir mensajes específicos y crear experiencias memorables para tus usuarios.',
                'level_id' => 1,            // Básico
                'category_id' => 2,         // Diseño web
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Introducción a PostgreSQL',
                'subtitle' => 'Aprende los fundamentos de la administración de bases de datos con PostgreSQL.',
                'description' => 'En este curso básico de PostgreSQL, te introduciremos en el mundo de los sistemas de gestión de bases de datos relacionales. Aprenderás cómo instalar y configurar PostgreSQL, cómo crear y manipular bases de datos y tablas, y cómo realizar consultas básicas utilizando SQL. Al final del curso, tendrás una comprensión sólida de los conceptos esenciales para trabajar con bases de datos utilizando PostgreSQL.',
                'level_id' => 1,            // Básico
                'category_id' => 4,         // Bases de datos
                'price_id' => 2,            // Básico
            ],
            [
                'title' => 'Eloquent en profundidad',
                'subtitle' => 'Perfecciona tus habilidades en el manejo de bases de datos con Eloquent ORM.',
                'description' => 'En este curso avanzado de Eloquent, exploraremos las características más avanzadas y poderosas de este ORM de Laravel. Aprenderás a utilizar relaciones complejas, consultas avanzadas, técnicas de optimización de rendimiento y estrategias para trabajar con bases de datos a gran escala. Con ejemplos prácticos y casos de uso reales, te convertirás en un experto en el manejo de datos utilizando Eloquent.',
                'level_id' => 3,            // Avanzado
                'category_id' => 1,         // Desarrollo web
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Dominando Java: Curso Completo',
                'subtitle' => 'Conviértete en un experto en Java con este curso exhaustivo y práctico.',
                'description' => 'En este curso completo de Java, te sumergirás en todos los aspectos del lenguaje de programación más utilizado en el mundo. Desde los conceptos básicos hasta las técnicas avanzadas, aprenderás sobre la sintaxis de Java, programación orientada a objetos, manejo de excepciones, colecciones, hilos, E/S, y mucho más. Con proyectos prácticos y ejercicios desafiantes, adquirirás las habilidades necesarias para desarrollar aplicaciones robustas y escalables en Java.',
                'level_id' => 3,            // Avanzado
                'category_id' => 3,         // Lenguajes de programación
                'price_id' => 5,            // Experto
            ],
            // 10
            [
                'title' => 'Introducción al Machine Learning',
                'subtitle' => 'Descubre el fascinante mundo del Machine Learning y sus aplicaciones en la vida real.',
                'description' => 'En este curso de introducción al Machine Learning, exploraremos los conceptos fundamentales y las técnicas más comunes de aprendizaje automático. Aprenderás cómo preparar datos, entrenar modelos, evaluar su rendimiento y aplicarlos en problemas del mundo real. Desde algoritmos básicos como regresión lineal hasta técnicas más avanzadas como redes neuronales, este curso te proporcionará una base sólida para embarcarte en tu viaje en el campo del Machine Learning.',
                'level_id' => 2,            // Intermedio
                'category_id' => 3,         // Lenguajes de programación
                'price_id' => 3,            // Intermedio
            ],
            [
                'title' => 'Dominando Laravel Livewire',
                'subtitle' => 'Aprende a construir aplicaciones web interactivas con Laravel Livewire.',
                'description' => 'En este curso de Laravel Livewire, exploraremos cómo utilizar esta poderosa biblioteca para crear aplicaciones web interactivas de manera sencilla y eficiente. Aprenderás a construir componentes dinámicos, gestionar estados de forma intuitiva y trabajar con eventos en tiempo real, todo ello sin tener que escribir JavaScript. Con ejemplos prácticos y proyectos reales, te convertirás en un experto en el desarrollo de aplicaciones web modernas con Laravel y Livewire.',
                'level_id' => 2,            // Intermedio
                'category_id' => 1,         // Desarrollo web
                'price_id' => 4,            // Avanzado
            ],
            [
                'title' => 'Introducción a Figma',
                'subtitle' => 'Aprende a diseñar interfaces de usuario de forma rápida y sencilla con Figma.',
                'description' => 'En este curso de introducción a Figma, te familiarizarás con la interfaz y las principales funcionalidades de esta poderosa herramienta de diseño. Aprenderás a crear y editar diseños de forma colaborativa, utilizar componentes reutilizables, y compartir tus trabajos con otros colaboradores. Con ejercicios prácticos y tutoriales paso a paso, estarás listo para comenzar a crear tus propios diseños profesionales con Figma.',
                'level_id' => 1,            // Básico
                'category_id' => 2,         // Diseño web
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Programación Funcional con Python',
                'subtitle' => 'Descubre los fundamentos de la programación funcional y cómo aplicarlos en Python.',
                'description' => 'En este curso de programación funcional con Python, exploraremos los conceptos clave de la programación funcional y cómo implementarlos en proyectos Python. Aprenderás sobre funciones de orden superior, expresiones lambda, map, filter, reduce, y otros constructos funcionales. Además, explorarás cómo la programación funcional puede mejorar la legibilidad, modularidad y reutilización de tu código. Con ejemplos prácticos y ejercicios, te sumergirás en el poder de la programación funcional en Python.',
                'level_id' => 2,            // Intermedio
                'category_id' => 3,         // Lenguajes de programación
                'price_id' => 3,            // Intermedio
            ],
            [
                'title' => 'Diseño Accesible y Usable',
                'subtitle' => 'Aprende a diseñar interfaces accesibles y fáciles de usar para todos los usuarios.',
                'description' => 'En este curso de diseño accesible y usable, descubrirás la importancia de crear interfaces que sean accesibles para todos, independientemente de sus capacidades o limitaciones. Aprenderás a aplicar principios de diseño inclusivo, a mejorar la navegabilidad y legibilidad de tus interfaces, y a optimizar la experiencia del usuario para diferentes dispositivos y contextos. Con ejemplos prácticos y técnicas comprobadas, te convertirás en un defensor del diseño centrado en el usuario y la accesibilidad.',
                'level_id' => 2,            // Intermedio
                'category_id' => 2,         // Diseño web
                'price_id' => 3,            // Intermedio
            ],
            [
                'title' => 'Dominando MySQL',
                'subtitle' => 'Aprende a manejar bases de datos con MySQL, desde lo básico hasta lo avanzado.',
                'description' => 'En este curso completo de MySQL, te sumergirás en el mundo de los sistemas de gestión de bases de datos relacionales. Aprenderás cómo instalar y configurar MySQL, diseñar bases de datos eficientes, crear tablas y relaciones, y escribir consultas SQL poderosas para gestionar datos. Además, explorarás técnicas avanzadas como transacciones, vistas, y procedimientos almacenados. Con ejercicios prácticos y proyectos reales, estarás preparado para utilizar MySQL en tus propias aplicaciones y proyectos.',
                'level_id' => 3,            // Avanzado
                'category_id' => 4,         // Bases de datos
                'price_id' => 4,            // Avanzado
            ],
            [
                'title' => 'Manejo de Eventos en JavaScript',
                'subtitle' => 'Aprende a trabajar con eventos en JavaScript para crear aplicaciones interactivas y dinámicas.',
                'description' => 'En este curso de manejo de eventos en JavaScript, exploraremos cómo trabajar con eventos para crear aplicaciones web más interactivas y dinámicas. Aprenderás sobre los diferentes tipos de eventos, cómo registrar y desencadenar eventos, y cómo manejar eventos de manera eficiente utilizando diferentes enfoques como captura de eventos, burbujeo de eventos y delegación de eventos. Con ejemplos prácticos y proyectos reales, mejorarás tus habilidades en el desarrollo frontend y crearás experiencias de usuario más atractivas.',
                'level_id' => 2,            // Intermedio
                'category_id' => 1,         // Desarrollo web
                'price_id' => 3,            // Intermedio
            ],
            [
                'title' => 'Introducción a WordPress',
                'subtitle' => 'Aprende a crear sitios web con WordPress, la plataforma de gestión de contenido más popular del mundo.',
                'description' => 'En este curso de introducción a WordPress, te familiarizarás con los fundamentos de esta poderosa plataforma de gestión de contenido. Aprenderás cómo instalar y configurar WordPress, crear y gestionar contenido con entradas y páginas, personalizar la apariencia de tu sitio utilizando temas y plugins, y administrar usuarios y permisos. Con ejemplos prácticos y tutoriales paso a paso, estarás listo para crear tu propio sitio web con WordPress de forma rápida y sencilla.',
                'level_id' => 1,            // Básico
                'category_id' => 1,         // Desarrollo web
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Arquitecturas Web Orientadas al SEO',
                'subtitle' => 'Aprende a diseñar y desarrollar arquitecturas web optimizadas para motores de búsqueda.',
                'description' => 'En este curso de arquitecturas web orientadas al SEO, exploraremos cómo diseñar y desarrollar sitios web teniendo en cuenta las mejores prácticas de optimización para motores de búsqueda (SEO). Aprenderás sobre la importancia de la estructura de URLs, la navegación y la jerarquía de contenido, la velocidad de carga, la optimización de imágenes y mucho más. Además, descubrirás cómo utilizar herramientas de análisis y seguimiento para mejorar el rendimiento SEO de tu sitio web. Con ejemplos prácticos y casos de estudio, estarás preparado para crear arquitecturas web que destaquen en los resultados de búsqueda.',
                'level_id' => 2,            // Intermedio
                'category_id' => 1,         // Desarrollo web
                'price_id' => 3,            // Intermedio
            ],
            [
                'title' => 'Diseño Avanzado de Bases de Datos Relacionales',
                'subtitle' => 'Aprende a diseñar y optimizar bases de datos relacionales para aplicaciones complejas.',
                'description' => 'En este curso de diseño avanzado de bases de datos relacionales, exploraremos técnicas y estrategias para diseñar y optimizar bases de datos que puedan manejar aplicaciones complejas y de gran escala. Aprenderás sobre modelado de datos avanzado, normalización, denormalización, índices, optimización de consultas y rendimiento de bases de datos. Además, explorarás prácticas recomendadas para asegurar la integridad y la consistencia de los datos. Con ejercicios prácticos y proyectos reales, mejorarás tus habilidades en el diseño y la administración de bases de datos relacionales.',
                'level_id' => 3,            // Avanzado
                'category_id' => 4,         // Bases de datos
                'price_id' => 4,            // Avanzado
            ],
            // 20
            [
                'title' => 'Optimización Avanzada para Motores de Búsqueda (SEO)',
                'subtitle' => 'Aprende técnicas avanzadas para mejorar el posicionamiento de tu sitio web en los motores de búsqueda.',
                'description' => 'En este curso de optimización avanzada para motores de búsqueda (SEO), profundizaremos en técnicas avanzadas y estrategias para mejorar el posicionamiento de tu sitio web en los motores de búsqueda. Aprenderás sobre investigación de palabras clave avanzada, optimización de contenido para diferentes etapas del embudo de ventas, estructuración de datos, optimización de velocidad de carga, estrategias de link building avanzadas y mucho más. Además, explorarás cómo realizar análisis detallados de la competencia y cómo utilizar herramientas avanzadas de SEO para obtener insights valiosos. Con ejemplos prácticos y casos de estudio, te convertirás en un experto en SEO capaz de llevar tu sitio web al siguiente nivel.',
                'level_id' => 3,            // Avanzado
                'category_id' => 5,         // Marketing Digital
                'price_id' => 4,            // Avanzado
            ],
            [
                'title' => 'Diseño de Interfaces Centrado en el Usuario',
                'subtitle' => 'Aprende a crear interfaces intuitivas y atractivas centradas en las necesidades de los usuarios.',
                'description' => 'En este curso de diseño de interfaces centrado en el usuario, exploraremos los principios fundamentales y las mejores prácticas para crear interfaces digitales que sean intuitivas, atractivas y efectivas. Aprenderás sobre la importancia de la investigación de usuarios, la arquitectura de la información, el diseño visual, la usabilidad y la accesibilidad. Además, descubrirás cómo utilizar herramientas y técnicas de diseño para prototipar y evaluar tus diseños. Con ejemplos prácticos y estudios de caso, mejorarás tus habilidades en el diseño de interfaces y crearás experiencias digitales memorables para tus usuarios.',
                'level_id' => 2,            // Intermedio
                'category_id' => 2,         // Diseño web
                'price_id' => 3,            // Intermedio
            ],
            [
                'title' => 'Aprende PHP Desde Cero',
                'subtitle' => 'Aprende PHP desde cero y lleva tus habilidades al siguiente nivel.',
                'description' => 'En este curso de PHP intermedio, te guiaremos a través de los fundamentos del lenguaje de programación PHP y te llevaremos al siguiente nivel. Aprenderás sobre conceptos avanzados como funciones, arrays multidimensionales, clases y objetos, manejo de archivos y directorios, y cómo interactuar con bases de datos MySQL. Además, explorarás técnicas de programación avanzada y buenas prácticas para escribir código limpio y mantenible. Con ejemplos prácticos y proyectos reales, te convertirás en un desarrollador PHP competente y listo para construir aplicaciones web dinámicas.',
                'level_id' => 2,            // Intermedio
                'category_id' => 3,         // Lenguajes de programación
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Dominando Alpine.js',
                'subtitle' => 'Aprende a crear aplicaciones web interactivas y dinámicas con Alpine.js.',
                'description' => 'En este curso de Alpine.js, exploraremos cómo utilizar este framework JavaScript ligero y fácil de aprender para crear aplicaciones web interactivas y dinámicas. Aprenderás sobre la sintaxis y las características principales de Alpine.js, como la manipulación del DOM, el manejo de eventos, el enlace de datos, y la creación de componentes reutilizables. Además, explorarás cómo integrar Alpine.js con otros frameworks y bibliotecas JavaScript. Con ejemplos prácticos y proyectos reales, te convertirás en un experto en el desarrollo frontend con Alpine.js.',
                'level_id' => 2,            // Intermedio
                'category_id' => 1,         // Desarrollo web
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Desarrollo Web Moderno con Laravel, Eloquent, Livewire, Tailwind CSS y Alpine.js',
                'subtitle' => 'Aprende a crear aplicaciones web modernas y dinámicas con las mejores tecnologías del ecosistema Laravel.',
                'description' => 'En este curso completo de desarrollo web, te sumergirás en el ecosistema de Laravel y aprenderás a utilizar las herramientas más potentes y modernas para construir aplicaciones web de alta calidad. Aprenderás a trabajar con el framework PHP Laravel para la construcción del backend, Eloquent ORM para la gestión de la base de datos, Livewire para la creación de componentes dinámicos, Tailwind CSS para el diseño frontend sin diseño y Alpine.js para la interactividad del cliente. Con ejemplos prácticos y proyectos reales, te convertirás en un desarrollador web completo y listo para enfrentar cualquier desafío en el mundo del desarrollo web moderno.',
                'level_id' => 3,            // Avanzado
                'category_id' => 1,         // Desarrollo web
                'price_id' => 3,            // Intermedio
            ],
            [
                'title' => 'Programación en C++ desde Cero',
                'subtitle' => 'Aprende los fundamentos de la programación en C++ desde cero hasta nivel intermedio.',
                'description' => 'En este curso de programación en C++, te introduciremos en los conceptos fundamentales de este potente lenguaje de programación. Aprenderás sobre la sintaxis básica de C++, tipos de datos, estructuras de control, funciones, punteros, y clases. Además, explorarás conceptos más avanzados como la programación orientada a objetos, la gestión de memoria y la manipulación de archivos. Con ejercicios prácticos y proyectos reales, estarás preparado para desarrollar aplicaciones de nivel intermedio en C++.',
                'level_id' => 2,            // Intermedio
                'category_id' => 3,         // Lenguajes de programación
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Introducción a las REST APIs',
                'subtitle' => 'Aprende a consumir y desarrollar REST APIs desde cero.',
                'description' => 'En este curso de introducción a las REST APIs, te familiarizarás con los conceptos fundamentales de las API RESTful y aprenderás cómo consumirlas y desarrollarlas. Aprenderás sobre los verbos HTTP, la estructura de las peticiones y respuestas REST, la autenticación y autorización, y las mejores prácticas para diseñar y documentar APIs. Además, explorarás cómo utilizar herramientas populares como cURL, Postman y Swagger para interactuar con APIs. Con ejemplos prácticos y proyectos reales, estarás listo para trabajar con APIs en tus propias aplicaciones.',
                'level_id' => 1,            // Básico
                'category_id' => 1,         // Desarrollo web
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Domina Google Ads: Guía para Principiantes',
                'subtitle' => 'Aprende a utilizar Google Ads de manera efectiva y maximiza el rendimiento de tus campañas publicitarias.',
                'description' => 'En este curso de Google Ads para principiantes, te guiaremos a través de los fundamentos de esta poderosa plataforma publicitaria y te enseñaremos cómo crear y gestionar campañas publicitarias exitosas. Aprenderás a configurar tu cuenta de Google Ads, seleccionar palabras clave relevantes, crear anuncios atractivos, y optimizar tus campañas para mejorar el retorno de la inversión. Además, explorarás técnicas avanzadas como la segmentación por audiencias, la optimización de conversiones y el remarketing. Con ejemplos prácticos y tutoriales paso a paso, estarás listo para dominar Google Ads y alcanzar tus objetivos de marketing.',
                'level_id' => 1,            // Básico
                'category_id' => 5,         // Marketing Digital
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Introducción a Blockchain',
                'subtitle' => 'Aprende los fundamentos de la tecnología blockchain y sus aplicaciones en el mundo real.',
                'description' => 'En este curso de introducción a blockchain, exploraremos los conceptos fundamentales de esta tecnología revolucionaria y su impacto en diversas industrias. Aprenderás cómo funciona la cadena de bloques, qué son los contratos inteligentes, cómo se asegura la integridad de los datos y cómo se lleva a cabo la minería de criptomonedas. Además, explorarás las aplicaciones prácticas de la tecnología blockchain en sectores como las finanzas, la logística, la salud y más. Con ejemplos prácticos y casos de estudio, estarás listo para comenzar a explorar el mundo de blockchain y sus posibilidades infinitas.',
                'level_id' => 1,            // Básico
                'category_id' => 3,         // Lenguajes de programación
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Diseño Responsivo: Construyendo Sitios Web Adaptativos',
                'subtitle' => 'Aprende a crear sitios web que se adapten a diferentes dispositivos y tamaños de pantalla.',
                'description' => 'En este curso de diseño responsivo, te enseñaremos cómo construir sitios web que se vean bien y funcionen correctamente en una amplia variedad de dispositivos, incluyendo ordenadores de escritorio, tabletas y teléfonos móviles. Aprenderás sobre los principios del diseño responsivo, como el uso de media queries, flexbox y grid layout. Además, explorarás técnicas avanzadas para optimizar la velocidad de carga y la experiencia del usuario en dispositivos móviles. Con ejemplos prácticos y proyectos reales, estarás preparado para crear sitios web modernos y adaptables que se destaquen en cualquier dispositivo.',
                'level_id' => 2,            // Intermedio
                'category_id' => 2,         // Diseño web
                'price_id' => 1,            // Gratis
            ],
            //30
            [
                'title' => 'SEO Local: Estrategias para Pequeñas Empresas',
                'subtitle' => 'Aprende a mejorar la visibilidad de tu negocio en búsquedas locales.',
                'description' => 'En este curso de SEO local, descubrirás cómo optimizar la presencia en línea de tu pequeña empresa para que aparezca en los resultados de búsqueda locales. Aprenderás a utilizar herramientas como Google My Business, a optimizar tu sitio web para búsquedas locales y a gestionar reseñas de clientes. Además, explorarás estrategias para aumentar la visibilidad de tu negocio en Google Maps y otros directorios locales.',
                'level_id' => 2,
                'category_id' => 5,
                'price_id' => 1,
            ],
            [
                'title' => 'Desarrollo de Aplicaciones Móviles con React Native',
                'subtitle' => 'Aprende a crear aplicaciones móviles multiplataforma con React Native.',
                'description' => 'En este curso de desarrollo de aplicaciones móviles, te introduciremos en React Native y te enseñaremos a construir aplicaciones móviles multiplataforma utilizando JavaScript y React. Aprenderás a crear interfaces de usuario nativas utilizando componentes de React, a acceder a funciones del dispositivo como la cámara y el GPS, y a compilar aplicaciones para iOS y Android. Con ejemplos prácticos y proyectos reales, estarás listo para desarrollar tus propias aplicaciones móviles con React Native.',
                'level_id' => 2,
                'category_id' => 1,
                'price_id' => 3,
            ],
            [
                'title' => 'Machine Learning con Python y Scikit-learn',
                'subtitle' => 'Aprende a construir modelos de machine learning con Python y Scikit-learn.',
                'description' => 'En este curso de machine learning, exploraremos los fundamentos de la inteligencia artificial y te enseñaremos a construir y entrenar modelos de machine learning utilizando Python y la biblioteca Scikit-learn. Aprenderás sobre algoritmos de clasificación, regresión y clustering, y cómo evaluar el rendimiento de los modelos. Además, explorarás técnicas para preprocesar datos, seleccionar características y optimizar parámetros de modelo. Con ejemplos prácticos y proyectos reales, estarás preparado para aplicar machine learning en una amplia variedad de problemas y casos de uso.',
                'level_id' => 2,
                'category_id' => 3,
                'price_id' => 2,
            ],
            [
                'title' => 'Desarrollo Web Completo con HTML, CSS y JavaScript',
                'subtitle' => 'Aprende a crear sitios web desde cero utilizando las tecnologías fundamentales del desarrollo web.',
                'description' => 'En este curso completo de desarrollo web, te guiaré a través de la creación de sitios web desde cero utilizando HTML, CSS y JavaScript. Aprenderás los fundamentos de la estructura del documento HTML, los estilos y diseños de página con CSS, y la interactividad dinámica con JavaScript. Cubriremos temas avanzados como responsive design, animaciones, y manipulación del DOM. Con ejemplos prácticos y proyectos reales, estarás listo para construir tus propios sitios web profesionales y efectivos.',
                'level_id' => 2,            // Intermedio
                'category_id' => 1,         // Desarrollo web
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Diseño Web con Elementor para WordPress',
                'subtitle' => 'Aprende a crear sitios web increíbles en WordPress utilizando el constructor de páginas Elementor.',
                'description' => 'En este curso de Diseño Web con Elementor, descubrirás cómo utilizar esta potente herramienta de creación de páginas para WordPress. Aprenderás a diseñar páginas web visualmente, arrastrando y soltando elementos, personalizando diseños y estilos sin necesidad de conocimientos de codificación. Explorarás las características avanzadas de Elementor, como widgets, efectos de desplazamiento, formularios de contacto y mucho más. Con ejemplos prácticos y tutoriales paso a paso, estarás preparado para crear sitios web impresionantes en WordPress de manera rápida y eficiente.',
                'level_id' => 2,            // Intermedio
                'category_id' => 2,         // Desarrollo web
                'price_id' => 2,            // Básico
            ],
            [
                'title' => 'Desarrollo de Aplicaciones Móviles con Ionic',
                'subtitle' => 'Aprende a construir aplicaciones móviles multiplataforma con Ionic, Angular y Cordova.',
                'description' => 'En este curso de desarrollo de aplicaciones móviles con Ionic, te sumergirás en el mundo del desarrollo multiplataforma utilizando tecnologías web estándar. Aprenderás a utilizar Ionic junto con Angular para construir aplicaciones móviles atractivas y funcionales. Explorarás cómo integrar funcionalidades nativas utilizando Cordova, y cómo implementar y publicar tus aplicaciones en tiendas de aplicaciones. Con ejemplos prácticos y proyectos reales, estarás preparado para desarrollar tus propias aplicaciones móviles con Ionic y llegar a una amplia audiencia en iOS y Android.',
                'level_id' => 2,            // Intermedio
                'category_id' => 1,         // Desarrollo web
                'price_id' => 3,            // Intermedio
            ],
            [
                'title' => 'Desarrollo de Aplicaciones Móviles con Flutter y Dart',
                'subtitle' => 'Construye aplicaciones móviles atractivas y multiplataforma con el framework Flutter y el lenguaje Dart.',
                'description' => 'En este curso de desarrollo de aplicaciones móviles, aprenderás a utilizar Flutter y Dart para crear aplicaciones nativas y atractivas que funcionan en iOS y Android. Explorarás la estructura del framework, la creación de interfaces de usuario fluidas con widgets personalizables, y la gestión eficiente del estado de la aplicación. Aprenderás a implementar funcionalidades avanzadas, como integración de API, gestión de rutas y almacenamiento local. Con ejemplos prácticos y proyectos reales, estarás preparado para llevar tus ideas a dispositivos móviles con Flutter y Dart.',
                'level_id' => 2,            // Intermedio
                'category_id' => 1,         // Desarrollo web
                'price_id' => 3,            // Intermedio
            ],
            [
                'title' => 'Microdatos para SEO: Optimiza tu Contenido para los Motores de Búsqueda',
                'subtitle' => 'Aprende a implementar microdatos para mejorar la visibilidad y clasificación de tu contenido en los motores de búsqueda.',
                'description' => 'En este curso de microdatos para SEO, exploraremos cómo utilizar microdatos y schema.org para enriquecer la información de tus páginas web y mejorar su comprensión por parte de los motores de búsqueda. Aprenderás a marcar contenido como productos, reseñas, eventos y más, proporcionando datos estructurados que pueden generar fragmentos enriquecidos en los resultados de búsqueda. Además, explorarás las herramientas disponibles para validar y probar tus marcados de microdatos. Con ejemplos prácticos y casos de estudio, estarás listo para potenciar la visibilidad de tu contenido en los resultados de búsqueda.',
                'level_id' => 2,            // Intermedio
                'category_id' => 5,         // Marketing Digital
                'price_id' => 2,            // Básico
            ],
            [
                'title' => 'Programación Orientada a Objetos (POO) con Ejemplos Prácticos',
                'subtitle' => 'Aprende los principios fundamentales de la programación orientada a objetos con ejemplos aplicados en diversos lenguajes de programación.',
                'description' => 'En este curso de programación orientada a objetos, te introduciremos en los principios esenciales de la POO y cómo aplicarlos en el desarrollo de software. Aprenderás sobre conceptos clave como clases, objetos, herencia, polimorfismo, encapsulamiento y abstracción. Explorarás cómo diseñar sistemas utilizando los principios de la POO para lograr un código modular, reutilizable y fácil de mantener. Con ejemplos prácticos en diversos lenguajes de programación, estarás preparado para adoptar la programación orientada a objetos en tus proyectos y mejorar la eficiencia de tu desarrollo de software.',
                'level_id' => 2,            // Intermedio
                'category_id' => 3,         // Lenguajes de programación
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Introducción al Diseño de Interfaces',
                'subtitle' => 'Descubre los principios fundamentales del diseño de interfaces y crea experiencias de usuario impactantes.',
                'description' => 'En este curso de iniciación al diseño de interfaces, te sumergirás en los principios esenciales del diseño centrado en el usuario. Aprenderás sobre la importancia de la arquitectura de la información, la jerarquía visual, el uso del color y la tipografía, y cómo crear diseños intuitivos y atractivos. Explorarás herramientas populares de diseño y prototipado para plasmar tus ideas. Con ejemplos prácticos y proyectos aplicados, estarás listo para iniciar tu viaje en el diseño de interfaces y crear experiencias de usuario memorables.',
                'level_id' => 1,            // Básico
                'category_id' => 2,         // Diseño gráfico
                'price_id' => 1,            // Gratis
            ],
            // 40
            [
                'title' => 'Análisis de Datos con R: Curso Completo',
                'subtitle' => 'Domina R y desbloquea el poder del análisis estadístico y la visualización de datos.',
                'description' => 'En este curso completo de análisis de datos con R, aprenderás desde los fundamentos hasta las técnicas avanzadas de este poderoso lenguaje de programación estadística. Descubrirás cómo importar, limpiar y explorar datos, aplicar análisis estadísticos, crear visualizaciones impactantes y realizar modelado predictivo. Además, explorarás paquetes populares como ggplot2 y dplyr para mejorar tus habilidades de manipulación y visualización de datos. Con ejercicios prácticos y proyectos, estarás preparado para aplicar R en tu trabajo y tomar decisiones informadas basadas en datos.',
                'level_id' => 3,            // Avanzado
                'category_id' => 3,         // Lenguajes de programación
                'price_id' => 5,            // Experto
            ],
            [
                'title' => 'Seguridad en Aplicaciones Web: Protegiendo tu Código y Datos',
                'subtitle' => 'Aprende las mejores prácticas para asegurar aplicaciones web y proteger contra amenazas de seguridad.',
                'description' => 'En este curso de seguridad en aplicaciones web, te sumergirás en las técnicas y mejores prácticas para asegurar tus aplicaciones y proteger la integridad de tus datos. Aprenderás sobre las vulnerabilidades comunes, como inyecciones SQL, ataques de scripting, cross-site scripting (XSS) y cross-site request forgery (CSRF). Explorarás cómo implementar medidas de seguridad como autenticación robusta, autorización, encriptación y auditorías de seguridad. Con ejemplos prácticos y simulaciones de ataques, estarás preparado para fortalecer la seguridad de tus aplicaciones web y mitigar riesgos potenciales.',
                'level_id' => 2,            // Intermedio
                'category_id' => 1,         // Desarrollo web
                'price_id' => 4,            // Avanzado
            ],
            [
                'title' => 'Migración entre Versiones de Laravel: De la 9 a la 10',
                'subtitle' => 'Aprende a adaptar tu aplicación a las últimas versiones de Laravel y aprovecha las nuevas características.',
                'description' => 'En este curso de migración entre versiones de Laravel, te guiaremos a través de los pasos necesarios para actualizar tu aplicación de Laravel 9 a Laravel 10. Aprenderás sobre las principales diferencias en la estructura del proyecto, cambios en la sintaxis, nuevas características y cómo manejar posibles problemas de incompatibilidad. Con ejemplos prácticos y casos de estudio, estarás preparado para mantener tu aplicación actualizada y aprovechar al máximo las últimas funcionalidades de Laravel.',
                'level_id' => 2,            // Intermedio
                'category_id' => 1,         // Desarrollo web
                'price_id' => 3,            // Intermedio
            ],
            [
                'title' => 'Historia del Diseño Web: Desde sus Orígenes hasta la Actualidad',
                'subtitle' => 'Explora la evolución del diseño web y descubre las tendencias que han marcado su desarrollo a lo largo del tiempo.',
                'description' => 'En este curso de historia del diseño web, viajarás a través del tiempo para comprender la fascinante evolución de la estética y funcionalidad de los sitios web. Desde los primeros días de la web estática hasta la explosión del diseño responsive y las tendencias actuales, explorarás hitos clave, tecnologías emergentes y cambios en la experiencia del usuario. Analizarás cómo el diseño web ha respondido a avances tecnológicos, cambios culturales y necesidades del usuario. Con ejemplos visuales y análisis detallado, estarás preparado para apreciar la rica historia del diseño web y aplicar lecciones aprendidas en proyectos modernos.',
                'level_id' => 1,            // Básico
                'category_id' => 2,         // Diseño gráfico
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Diseño Creativo con Canva: Desde Principiantes hasta Avanzados',
                'subtitle' => 'Aprende a utilizar Canva para crear gráficos, presentaciones y materiales visuales impactantes, ¡sin necesidad de ser un diseñador profesional!',
                'description' => 'En este curso de diseño creativo con Canva, te sumergirás en la versátil plataforma de diseño para aprender a crear gráficos visualmente atractivos y profesionales. Desde la creación de publicaciones para redes sociales y tarjetas de presentación hasta la elaboración de presentaciones y carteles, explorarás todas las herramientas y funciones clave de Canva. Aprenderás a trabajar con plantillas, personalizar diseños, utilizar elementos gráficos, y aplicar principios de diseño efectivos. Con tutoriales paso a paso y proyectos prácticos, estarás listo para expresar tu creatividad y diseñar de manera impactante con Canva.',
                'level_id' => 1,            // Básico
                'category_id' => 2,         // Diseño gráfico
                'price_id' => 2,            // Básico
            ],
            [
                'title' => 'Diseño de Bases de Datos: Buenas Prácticas y Optimización',
                'subtitle' => 'Aprende las mejores técnicas para diseñar bases de datos eficientes, escalables y fáciles de mantener.',
                'description' => 'En este curso de diseño de bases de datos, te sumergirás en las buenas prácticas y estrategias clave para crear bases de datos robustas y optimizadas. Aprenderás a modelar datos, normalizar tablas, establecer relaciones eficientes y aplicar técnicas de indexación. Explorarás cómo diseñar esquemas de bases de datos escalables para adaptarse al crecimiento de datos. Además, abordarás temas como la integridad referencial, la seguridad y las consideraciones de rendimiento. Con ejemplos prácticos y casos de estudio, estarás preparado para diseñar bases de datos que sean la base sólida para aplicaciones y sistemas.',
                'level_id' => 2,            // Intermedio
                'category_id' => 4,         // Bases de datos
                'price_id' => 2,            // Básico
            ],
            [
                'title' => 'Desarrollo de Aplicación Web con PHP y MySQL',
                'subtitle' => 'Crea tu propia aplicación web desde cero utilizando PHP y MySQL.',
                'description' => 'En este curso de desarrollo de aplicación web, te guiaré a través del proceso de construcción de una aplicación sencilla utilizando PHP y MySQL. Aprenderás a establecer una conexión a la base de datos, realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar), y diseñar una interfaz de usuario amigable. Explorarás cómo manejar formularios, validar datos de entrada y garantizar la seguridad básica en tu aplicación. Con ejemplos prácticos y proyectos paso a paso, estarás listo para crear tus propias aplicaciones web utilizando estas tecnologías fundamentales.',
                'level_id' => 1,            // Básico
                'category_id' => 1,         // Desarrollo web
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Novedades de ECMAScript: Mantente al Día con JavaScript Moderno',
                'subtitle' => 'Explora las características más recientes de ECMAScript y mejora tus habilidades en JavaScript.',
                'description' => 'En este curso sobre las novedades de ECMAScript, aprenderás a estar al tanto de las últimas actualizaciones y características introducidas en JavaScript. Descubrirás cómo utilizar nuevas sintaxis, métodos y conceptos introducidos en versiones recientes de ECMAScript para mejorar la eficiencia y legibilidad de tu código. Explorarás temas como destructuring, arrow functions, async/await, y mucho más. Con ejemplos prácticos y proyectos, estarás preparado para aplicar las novedades de ECMAScript en tus desarrollos y mantenerte al día con el JavaScript moderno.',
                'level_id' => 2,            // Intermedio
                'category_id' => 3,         // Lenguajes de programación
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Desarrollo de Juego de Aventura Conversacional con Python',
                'subtitle' => 'Crea tu propio juego interactivo donde las decisiones del jugador afectan la narrativa.',
                'description' => 'En este curso de desarrollo de juegos, te sumergirás en la creación de un juego de aventura conversacional utilizando el poder de Python. Aprenderás a estructurar la narrativa, gestionar la entrada del jugador, y construir un sistema que responda a las elecciones del usuario. Explorarás conceptos de programación orientada a objetos para modelar personajes y escenarios de juego. Además, implementarás funciones para manejar la lógica del juego, creando una experiencia interactiva y envolvente. Con ejemplos prácticos y proyectos paso a paso, estarás listo para llevar a los jugadores a una emocionante aventura a través de tu propio juego de Python.',
                'level_id' => 2,            // Intermedio
                'category_id' => 3,         // Lenguajes de programación
                'price_id' => 1,            // Gratis
            ],
            [
                'title' => 'Desarrollo de Aplicación Web con Java y Tecnologías Modernas',
                'subtitle' => 'Aprende a construir aplicaciones web escalables y eficientes con el lenguaje Java y herramientas contemporáneas.',
                'description' => 'En este curso de desarrollo de aplicaciones web con Java, te sumergirás en la creación de aplicaciones modernas y escalables. Utilizarás tecnologías como Spring Framework para la gestión del ciclo de vida de la aplicación, Hibernate para el acceso a la base de datos, y Thymeleaf para las plantillas HTML. Aprenderás a construir una arquitectura MVC robusta, gestionar sesiones de usuario, y trabajar con bases de datos relacionales. Explorarás la creación de APIs RESTful y cómo integrar tecnologías front-end como Bootstrap y JavaScript. Con ejemplos prácticos y proyectos, estarás preparado para desarrollar aplicaciones web completas con Java y tecnologías contemporáneas.',
                'level_id' => 2,            // Intermedio
                'category_id' => 1,         // Desarrollo web
                'price_id' => 3,            // Intermedio
            ],
            // 50
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
                'iframe' => '<iframe src="https://www.youtube.com/embed/FUKmyRLOlAA" width="560" height="315" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
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
                'status' => fake()->randomElement([1, 2, 3]),
                'user_id' => fake()->randomElement($teachers),
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
                        if (fake()->randomElement([0, 0, 1])) {
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
