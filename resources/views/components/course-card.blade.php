<article class="flex flex-col bg-white shadow-md rounded-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">

    <img src="{{ $course->imagePath }}" alt="">

    <div class="flex flex-col flex-1 px-4 md:px-2 pt-2 pb-4">
        <h3 class="text-center text-xl text-gray-700 mb-2">{{ Str::limit($course->title, 40) }}</h3>
        <p class="text-gray-500 text-sm mt-auto mb-2">
            Por <a href="{{-- perfil de profe --}}"
                    class="text-teal-500 hover:text-teal-700">{{$course->teacher->name}}</a>
        </p>

        <div class="cursor-default">
            <ul class="flex text-xs justify-between mb-2">
                <li class="text-gray-500 mr-2"
                    title="Usuarios matriculados">
                    <i class="fa-solid fa-users"></i>
                    {{$course->students_count}}
                </li>
                <li class="text-gray-500 mr-2">
                    <i class="fa-solid fa-layer-group"></i>
                    {{$course->category->name}}
                </li>

                <li class="text-gray-500 mr-2">
                    <i class="fa-solid fa-cubes"></i>
                    {{$course->level->name}}
                </li>
            </ul>
        </div>

        <div class="mb-2">
            <p class="text-sm text-gray-700">{{ Str::limit($course->description, 100) }}</p>
        </div>

        <div class="flex items-center mb-2 cursor-default">

            <span class="font-semibold text-gray-500 mr-1">{{ $course->rating }}</span>

            <div class="flex text-sm">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($course->rating >= $i)
                        <i class="fa-solid fa-star text-amber-400"></i>
                    @else
                        <i class="fa-solid fa-star text-gray-500"></i>
                    @endif
                @endfor
            </div>
            <span class="text-sm text-gray-500 ml-2">({{ $course->reviews_count }})</span>
        </div>

        <div>
            <span class="text-gray-700 text-lg font-bold">{{ number_format($course->price->price, 2, ',', '.') }} €</span>
        </div>

        <x-link-button color="teal" class="w-full justify-center mt-2"
                href="{{ route('courses.show', $course) }}">Más info</x-link-button>
    </div>
</article>
