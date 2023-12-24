<div class="mt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-3 gap-8">

        {{-- Columna izquierda--}}
        <div class="col-span-2">

            <div class="embed-responsive rounded">
                {!! $lesson->iframe !!}
            </div>

            <h1 class="text-2xl text-gray-700 font-bold">
                {{ $lesson->title }}
            </h1>

            @if ($lesson->description)
                <div class="text-gray-700">
                    {{ $lesson->description->description }}
                </div>
            @endif

            <label class="relative inline-flex items-center mt-2 mb-5 cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Marcar lección como completa</span>
            </label>

            <div class="flex justify-between text-gray-700 bg-white shadow-lg rounded-lg p-4">
                @if ($previous)
                <x-link-button href="{{route('courses.learn', [$course, $previous])}}">
                    Anterior
                </x-link-button>
                @else
                <x-link-button href="#" class="bg-gray-300 hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-300 cursor-default" disabled>
                    Anterior
                </x-link-button>
                @endif

                @if ($next)
                <x-link-button href="{{route('courses.learn', [$course, $next])}}">
                    Siguiente
                </x-link-button>
                @else
                <x-link-button href="#" class="bg-gray-300 hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-300 cursor-default" disabled>
                    Siguiente
                </x-link-button>
                @endif
            </div>
        </div>

        {{-- Columna derecha--}}
        <div class="text-gray-700 bg-white shadow-lg rounded p-4">
            <p class="text-xl font-bold text-center">{{ $course->title }}</p>

            <div class="flex items-center mt-2">
                <figure>
                    <img class="h-16 w-16 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                </figure>
                <div class="ml-2">
                    <p>Realizado por</p>
                    <h3 class="text-3xl font-bold">
                        {{ $course->teacher->name }}
                    </h3>
                    <a class="text-sm text-teal-500 hover:text-teal-700"
                            href="">
                        {{'@' . Str::slug($course->teacher->name, '')}}
                    </a>
                </div>
            </div>

            <ul class="mt-4">
                @foreach ($course->sections as $section)
                    <li>
                        <span class="font-bold text-rose-600">[{{ $section->id }}]</span>
                        <a class="font-bold" href="">
                            {{ Str::limit($section->title, 30) }}
                        </a>
                        <ul>
                            @foreach ($section->lessons as $lesson)
                                <li>
                                    <i class="fa-solid fa-play-circle mr-2"></i>
                                    <a href="{{ route('courses.learn', [$course, $lesson]) }}">
                                        <span class="font-bold text-rose-400">[{{ $lesson->id }}]</span>
                                        {{ Str::limit($lesson->title, 30) }}
                                    </a>
                                </li>

                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>

        </div>

    </div>
</div>
