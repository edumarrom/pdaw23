<x-app-layout>
    <section class="bg-cover {{-- bg-right-top bg-no-repeat --}} py-12" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url({{Storage::url($course->image->path) }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-80 w-full object-cover rounded border-4 border-gray-300 border-s-white" src="{{Storage::url($course->image->path)}}" alt="">
            </figure>

            <div class="text-gray-100">
                <h1 class="text-4xl font-bold">{{$course->title}}</h1>
                <h2 class="text-xl mt-2">{{$course->subtitle}}</h2>
                <ul class="text-lg mt-8">
                    <li title="Categoría">
                        <i class="fa fa-solid fa-layer-group text-xl mr-2"></i>
                        {{$course->category->name}}
                    </li>
                    <li title="Nivel">
                        <i class="fa-solid fa-cubes text-xl mr-2"></i>
                        {{$course->level->name}}
                    </li>
                    <li title="Alumnos matriculados">
                        <i class="fa-solid fa-users text-xl mr-2"></i>
                        {{$course->students_count}}
                    </li>
                    <li>
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($course->rating >= $i)
                                <i class="fa-solid fa-star"></i>
                            @else
                                <i class="fa-solid fa-star text-gray-500"></i>
                            @endif
                        @endfor
                        ({{$course->rating}})
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-3">

        <div class="col-span-2">
            <section>
                <h3 class="text-3xl font-bold mt-6 mb-2">
                    <i class="fa fa-solid fa-flag-checkered rotate-45 mr-2"></i>
                    Objetivos de prendizaje
                </h3>
                <div class="text-gray-700 bg-white shadow rounded p-4 space-y-4">
                    <ul class="grid grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="">
                                <i class="fa fa-solid fa-caret-right text-lg mr-2"></i>
                                {{$goal->name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section>
                <h3 class="text-3xl font-bold mt-6 mb-2">
                    <i class="fa fa-solid fa-vial mr-2"></i>
                    Requisitos previos
                </h3>
                <div class="text-gray-700 bg-white shadow rounded p-4 space-y-4">
                    <ul class="grid grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->requirements as $requirement)
                            <li class="">
                                <i class="fa fa-solid fa-caret-right text-lg mr-2"></i>
                                {{$requirement->name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section>
            <h3 class="text-3xl font-bold mt-6 mb-2">
                <i class="fa fa-solid fa-book rotate-45 mr-2"></i>
                Contenido del curso
            </h3>

            <div class="grid grid-cols-1 text-gray-700 bg-white rounded divide-y-2">
                @foreach ($course->sections as $section)
                    <article class="py-2">
                        <header class="px-4 py-2 cursor-pointer">
                            <h4 class="text-lg font-bold underline">{{ $section->title }}</h4>
                        </header>

                        <div>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <a href="{{-- ruta al visor de lección --}}">
                                        <li class="flex px-4 py-2 hover:bg-gray-200">
                                            <i class="fa fa-solid fa-play-circle text-lg mr-2"></i>
                                            {{ $lesson->title }}
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        </div>

                    </article>
                @endforeach
            </div>

            </section>
        </div>

    </div>
</x-app-layout>
