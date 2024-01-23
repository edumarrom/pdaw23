<x-app-layout>

    {{-- Hero Section --}}
    <section class="bg-cover" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3)), url({{ asset('img/home/landing_home.jpg') }})">
        <div class="container py-36">
            <div class="with-full md:w3/4 lg:w-1/2">
                <h1 class="text-4xl text-white font-bold">El placer de aprender con Dabaliu</h1>
                <p class="text-lg text-white mt-2">
                    Dabaliu es tu plataforma de formación en línea donde puedes aprender, ampliar tus conocimientos, e
                    incluso compartirlos con la comunidad.
                </p>

                {{-- Search bar --}}
                @livewire('search')

            </div>
        </div>
    </section>

    <section class="mt-24">
        <p class="text-gray-600 text-center text-3xl mb-6">Con Dabaliu encontrarás</p>

        <div class="container py-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="h-48 w-full object-cover" src="{{ asset('img/home/startup.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h2 class="text-center text-xl text-gray-700">
                        Descubre el Futuro de la Programación
                    </h2>

                    <p class="text-sm text-gray-500">
                        Sumérgete en Dabaliu: Cursos flexibles y al ritmo que elijas para dominar la programación.
                    </p>

                </header>

            </article>
            <article>
                <figure>
                    <img class="h-48 w-full object-cover" src="{{ asset('img/home/student.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h2 class="text-center text-xl text-gray-700">
                        Conviértete en un Experto en Desarrollo
                    </h2>

                    <p class="text-sm text-gray-500">
                        Dabaliu te guía hacia el éxito con cursos en vídeo para dominar el desarrollo de aplicaciones.
                    </p>

                </header>

            </article>
            <article>
                <figure>
                    <img class="h-48 w-full object-cover" src="{{ asset('img/home/home-office.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h2 class="text-center text-xl text-gray-700">
                        Crea y Comparte: Tu Conocimiento Importa
                    </h2>

                    <p class="text-sm text-gray-500">
                        Tú enseñas, tú aprendes en Dabaliu: Crea y comparte tu propio curso en nuestra plataforma.
                    </p>

                </header>

            </article>
            <article>
                <figure>
                    <img class="h-48 w-full object-cover" src="{{ asset('img/home/code.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h2 class="text-center text-xl text-gray-700">
                        Explora el Universo de la Programación
                    </h2>

                    <p class="text-sm text-gray-500">
                        Desde principiantes hasta avanzados: Dabaliu tiene el curso perfecto para tu viaje en programación
                    </p>

                </header>

            </article>
        </div>
    </section>

    <section class="mt-24 bg-blue-950 py-12">
        @auth
            @if ($lastCourseStudied)
            <div class="container">
                <h2 class="text-center text-white text-3xl mb-8">Continúa donde lo dejaste</h2>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    {{-- Columna izquierda --}}
                    <div class="lg:col-span-2">
                        <section>
                            <div class="px-4 py-2">
                                <div class="flex flex-col md:flex-row">
                                    <img class="w-auto h-36 aspect-[16/9] rounded object-cover object-center border-2 border-gray-300 border-s-white" src="{{ $lastCourseStudied->imagePath }}" alt="">

                                    <div class="flex flex-col flex-1 mx-2 justify-around text-white">
                                        <div>
                                            <h3 class="text-lg font-semibold ">
                                                {{$lastCourseStudied->title}}
                                            </h3>
                                            <p>Por {{ $lastCourseStudied->teacher->name }}</p>
                                            <div class="cursor-default">
                                                <ul class="flex text-xs mb-2">
                                                    <li class=" mr-2">
                                                        <i class="fa-solid fa-layer-group"></i>
                                                        {{$lastCourseStudied->category->name}}
                                                    </li>

                                                    <li class=" mr-2">
                                                        <i class="fa-solid fa-cubes"></i>
                                                        {{$lastCourseStudied->level->name}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="text-lg">
                                            Siguiente lección: <span class="text-base font-semibold">{{ $nextLesson->title }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    {{-- Columna derecha --}}
                    <div class="my-auto">
                        <div class="flex justify-center">
                            <x-link-button href="{{ route('courses.learn', $lastCourseStudied) }}" color="teal" class="py-4 px-6">
                                {{ __('Continuar con el curso') }}
                            </x-link-button>
                        </div>
                    </div>

                </div>
            </div>
            @else
                <h2 class="text-center text-white text-3xl">Aquí tienes una selección de nuestros cursos</h2>
                <p class="text-center text-white">Y si ninguno te convence pásate por la página de cursos y encuentra tu curso ideal.</p>

                <div class="flex justify-center mt-4">
                    <x-link-button href="{{ route('courses.index') }}" color="teal" class="py-4 px-6">
                        {{ __('Ver todos los cursos') }}
                    </x-link-button>
                </div>
            @endif
        @else
            <h2 class="text-center text-white text-3xl">¿Deseando aprender algo nuevo?</h2>
            <p class="text-center text-white">Crea una cuenta y comienza a formarte.</p>

            <div class="flex justify-center mt-4">
                <x-link-button href="{{ route('register') }}" color="teal" class="py-4 px-6">
                    {{ __('Regístrate') }}
                </x-link-button>
            </div>
        @endauth
    </section>

    <section class="mt-24">

        <h2 class="text-gray-600 text-center text-3xl font-semibold">
            Cursos más recientes
        </h2>
        <p class="text-center text-gray-600 text-sm mb-6">
            Recién publicados por nuestro profesores ¡Aún queman!. Estos son los últimos cursos publicados.
        </p>

        <div class="container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($mostRecentCourses as $course)

                <x-course-card :course="$course"></x-course-card>

            @endforeach

        </div>

    </section>

    <section class="mt-24">

        <h2 class="text-gray-600 text-center text-3xl font-semibold">
            Cursos mejor valorados
        </h2>
        <p class="text-center text-gray-600 text-sm mb-6">No lo decimos nosotros, sino sus alumnos. Estos son los cursos con la mejores opiniones.</p>


        <div class="container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($bestRatedCourses as $course)

                <x-course-card :course="$course"></x-course-card>

            @endforeach

        </div>

    </section>

</x-app-layout>
