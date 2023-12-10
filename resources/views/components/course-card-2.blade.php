<article class="flex flex-col bg-white border border-gray-500 rounded-lg overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">

    <img src="{{ Storage::url($course->image->path) }}" alt="">

    <div class="flex flex-col flex-1 px-4 md:px-2 py-4">
        <h3 class="text-center text-xl text-gray-700 mb-2">{{ Str::limit($course->title, 40) }}</h3>
        <p class="text-gray-500 text-sm mt-auto mb-2">
            Por <a href="{{-- perfil de profe --}}"
                    class="text-teal-500 hover:text-teal-700">{{$course->teacher->name}}</a>
        </p>

        <div class="cursor-default">
            <ul class="flex text-sm justify-between">
                <li class="text-gray-500 mr-2">
                    <i class="fa-solid fa-star"></i>
                    {{$course->rating}}
                </li>
                <li class="text-gray-500 mr-2"
                    title="Usuarios matriculados">
                    <i class="fa-solid fa-users"></i>
                    {{$course->students_count}}
                </li>
                <li class="text-gray-500 mr-2">
                    <i class="fa-solid fa-layer-group"></i>
                    {{$course->category->name}}
                </li>
            </ul>

        </div>

        <div>
            <p class="text-sm text-gray-700">{{ Str::limit($course->description, 100) }}</p>
        </div>

        <x-link-button class="w-full text-center bg-teal-500 hover:bg-teal-700 mt-2"
                href="{{ route('courses.show', $course) }}">Más info</x-link-button>
    </div>
</article>
