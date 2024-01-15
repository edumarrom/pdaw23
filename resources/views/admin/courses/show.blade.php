<x-admin-layout>
    <section class="bg-cover {{-- bg-right-top bg-no-repeat --}} py-12" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url({{$course->imagePath }})">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-80 w-full object-cover rounded border-4 border-gray-300 border-s-white" src="{{$course->imagePath}}" alt="">
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

    <div class="container mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Columna izquierda --}}
        <div class="lg:col-span-2 order-2 lg:order-1 space-y-12">

            <section>
                <h3 class="text-3xl font-bold mt-6 mb-2">
                    <i class="fa fa-solid fa-circle-info mr-2"></i>
                    Acerca del curso
                </h3>

                <div class="card space-y-4">
                    {{$course->description}}
                </div>
            </section>

            <section>
                <h3 class="text-3xl font-bold mt-6 mb-2">
                    <i class="fa fa-solid fa-graduation-cap mr-2"></i>
                    Lo que aprenderás
                </h3>
                <div class="card space-y-4">
                    @if ($course->goals->count())
                        <ul class="grid grid-cols-1 gap-x-6 gap-y-2 md:grid-cols-2">
                            @foreach ($course->goals as $goal)
                                <li class="">
                                    <i class="fa fa-solid fa-check text-lg mr-2"></i>
                                    {{$goal->name}}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="flex items-center justify-center p-4">
                            <div class="flex flex-col items-center">
                                <i class="fa-solid fa-graduation-cap text-8xl text-gray-200 mb-6"></i>
                                <h3 class="text-lg font-bold text-gray-500">No hay metas definidas para este curso</h3>
                            </div>
                        </div>
                    @endif
                </div>
            </section>

            <section>
                <h3 class="text-3xl font-bold mt-6 mb-2">
                    <i class="fa fa-solid fa-list-check mr-2"></i>
                    Lo que debes saber
                </h3>
                <div class="card space-y-4">
                    @if ($course->requirements->count())
                        <ul class="grid grid-cols-1 gap-x-6 gap-y-2 md:grid-cols-2">
                            @foreach ($course->requirements as $requirement)
                                <li class="">
                                    <i class="fa fa-solid fa-check text-lg mr-2"></i>
                                    {{$requirement->name}}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="flex items-center justify-center p-4">
                            <div class="flex flex-col items-center">
                                <i class="fa-solid fa-list-check text-8xl text-gray-200 mb-6"></i>
                                <h3 class="text-lg font-bold text-gray-500">No hay requisitos definidos para este curso.</h3>
                            </div>
                        </div>
                    @endif
                </div>
            </section>

            <section>
                <h3 class="text-3xl font-bold mt-6 mb-2">
                    <i class="fa fa-solid fa-book mr-2"></i>
                    Contenido del curso
                </h3>

                <div class="grid grid-cols-1 text-gray-700  bg-white shadow rounded divide-y-2">
                    @forelse ($course->sections as $section)
                        <article class="py-2"
                            @if ($loop->first)
                                x-data="{open: true}"
                            @else
                                x-data="{open: false}"
                            @endif>
                            <header class="px-4 py-2 cursor-pointer" x-on:click="open =!open">
                                <h4 class="text-xl font-bold">
                                    <i class="fa fa-solid fa-caret-right text-lg mr-2 transition-all"
                                            x-bind:class="!open || 'rotate-90'"></i>
                                    {{ $section->title }}
                                </h4>
                            </header>

                            <div x-show="open" x-collapse>
                                <hr/>
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
                    @empty
                        <div class="flex items-center justify-center p-4">
                            <div class="flex flex-col items-center">
                                <i class="fa-solid fa-book text-8xl text-gray-200 mb-6"></i>
                                <h3 class="text-lg font-bold text-gray-500">No hay contenido definido para este curso</h3>
                            </div>
                        </div>
                    @endforelse
                </div>

            </section>

            <section>
                <h3 class="text-3xl font-bold mt-6 mb-2">
                    <i class="fa fa-solid fa-comment-dots mr-2"></i>
                    Opiniones
                </h3>
                <div class="card p-0 divide-y-2">
                    @forelse ($course->reviews as $review)

                        <article class="flex p-4">
                            <figure class="mr-4">
                                <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$review->user->profile_photo_url}}" alt="">
                            </figure>
                            <div class="flex-1">
                                <div>
                                    <h2 class="text-xl font-bold">{{$review->user->name}}</h2>
                                    <ul class="flex text-sm">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($review->rating >= $i)
                                                <li class="mr-1"><i class="fa fa-solid fa-star text-amber-400"></i></li>
                                            @else
                                                <li class="mr-1"><i class="fa fa-solid fa-star text-gray-400"></i></li>
                                            @endif
                                        @endfor
                                    </ul>
                                    {{$review->comment}}
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="flex items-center justify-center p-4">
                            <div class="flex flex-col items-center">
                                <i class="fa-solid fa-star text-8xl text-gray-200 mb-6"></i>
                                <h3 class="text-lg font-bold text-gray-500">Este curso aún no ha recibido opiniones</h3>
                            </div>
                        </div>
                    @endforelse
                </div>
            </section>
        </div>

        {{-- Columna derecha --}}
        <div class="order-1 lg:order-2 lg:relative lg:bottom-24">
            <section class="card shadow-lg space-y-4">
                <div>
                    <div class="flex">
                        <img class="h-16 w-16 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">

                        <div class="ml-2">
                            <p>Realizado por</p>
                            <h3 class="text-xl font-bold">
                                {{ $course->teacher->name }}
                            </h3>
                            <a class="text-sm text-teal-500 hover:text-teal-700"
                                    href="">
                                {{'@' . Str::slug($course->teacher->name, '')}}
                            </a>
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <form action="" method="post"
                                class="w-full mx-0.5">
                            @csrf
                            <x-button color="blue" class="w-full justify-center rounded-md !text-sm h-12 mt-4">
                                Aprobar
                            </x-button>
                        </form>
                        <form action="" method="post"
                                class="w-full mx-0.5">
                            @csrf
                            <x-button color="rose" class="w-full justify-center rounded-md !text-sm h-12 mt-4">
                                Rechazar
                            </x-button>
                        </form>
                    </div>

                </div>
            </section>
        </div>

    </div>
</x-admin-layout>
