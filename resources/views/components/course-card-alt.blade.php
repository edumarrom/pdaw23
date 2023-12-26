<article class="bg-white border border-gray-500 rounded-lg overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">

    <img src="{{ Storage::url($course->image->path) }}" alt="">

    <div class="px-4 md:px-2 py-4">
        <h3 class="text-center text-xl text-gray-700 mb-2">{{ Str::limit($course->title, 40) }}</h3>
        <p class="text-gray-500 text-sm mb-2">
            Por <a href="{{-- perfil de profe --}}"
                    class="text-teal-500 hover:text-teal-700">{{$course->teacher->name}}</a>
        </p>

        <div class="flex">
            <ul class="flex text-sm">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($course->rating >= $i)
                        <i class="fa-solid fa-star text-yellow-500"></i>
                    @else
                        <i class="fa-solid fa-star text-gray-500"></i>
                    @endif
                @endfor
            </ul>
            <p class="text-sm text-gray-500 ml-2">
                {{-- A --}}({{ $course->rating }})
                {{-- B --}}{{-- ({{ $course->reviews_count }}) --}}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-700">{{ Str::limit($course->description, 100) }}</p>
        </div>

        <x-link-button class="w-full text-center btn-teal mt-2">Más info</x-link-button>
    </div>
</article>
