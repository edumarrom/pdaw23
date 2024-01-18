<x-app-layout>
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
                        <span class="text-2xl mx-1 font-semibold">{{$course->rating}}</span>
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($course->rating >= $i)
                                <i class="fa-solid fa-star"></i>
                            @else
                                <i class="fa-solid fa-star text-gray-500"></i>
                            @endif
                        @endfor
                        <span class="ml-2">({{ $course->reviews_count }} valoraciones)</span>
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
                    <ul class="grid grid-cols-1 gap-x-6 gap-y-2 md:grid-cols-2">
                        @foreach ($course->goals as $goal)
                            <li class="">
                                <i class="fa fa-solid fa-check text-lg mr-2"></i>
                                {{$goal->name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section>
                <h3 class="text-3xl font-bold mt-6 mb-2">
                    <i class="fa fa-solid fa-list-check mr-2"></i>
                    Lo que debes saber
                </h3>
                <div class="card space-y-4">
                    <ul class="grid grid-cols-1 gap-x-6 gap-y-2 md:grid-cols-2">
                        @foreach ($course->requirements as $requirement)
                            <li class="">
                                <i class="fa fa-solid fa-check text-lg mr-2"></i>
                                {{$requirement->name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section>
                <h3 class="text-3xl font-bold mt-6 mb-2">
                    <i class="fa fa-solid fa-book mr-2"></i>
                    Contenido del curso
                </h3>

                <div class="grid grid-cols-1 text-gray-700  bg-white shadow rounded divide-y-2">
                    @foreach ($course->sections as $section)
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
                    @endforeach
                </div>

            </section>

            @livewire('courses-reviews', ['course' => $course])

        </div>

        {{-- Columna derecha --}}
        <div class="order-1 lg:order-2 lg:relative lg:bottom-24">
            <section class="card shadow-lg space-y-4">
                <div>
                    <div class="flex items-center mb-4">
                        <img class="h-16 w-16 object-cover object-center flex-shrink-0 rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">

                        <div class="ml-2">
                            <p>Realizado por</p>
                            <h3 class="text-xl font-bold">
                                {{ $course->teacher->name }}
                            </h3>
                            {{-- <a class="text-sm text-teal-500 hover:text-teal-700"
                                    href="">
                                {{'@' . Str::slug($course->teacher->name, '')}}
                            </a> --}}
                        </div>
                    </div>

                    <div class="mb-2 text-4xl font-bold">
                        {{ $course->priceEur }}
                    </div>

                    @can('enrolled', $course)
                        <x-link-button color="teal" class="w-full justify-center rounded-md !text-sm h-12 mt-4"
                                href="{{ route('courses.learn', $course) }}">
                            Continuar con el curso
                        </x-link-button>
                    @else
                        @if ($course->price->price == 0)
                            <form action="{{ route('courses.enroll', $course) }}" method="post">
                                @csrf
                                <x-button color="teal" class="w-full justify-center rounded-md !text-sm h-12 mt-4">
                                    Inscríbete ahora
                                </x-button>
                            </form>
                        @else
                            <form action="{{ route('courses.enroll', $course) }}" method="post">
                                @csrf
                                <x-button color="teal" class="w-full justify-center rounded-md !text-sm h-12 mt-4">
                                    Comprar ahora
                                </x-button>
                            </form>
                        @endif

                    @endcan

                </div>
            </section>
        </div>

    </div>
</x-app-layout>
