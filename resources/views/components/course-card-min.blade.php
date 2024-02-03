<article class="flex flex-col bg-white shadow-md rounded-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
    <a href="{{ route('courses.learn', $course) }}">
        <img src="{{ $course->imagePath }}" alt="">

        <div class="flex flex-col flex-1 px-4 md:px-2 pt-2 pb-4">
            <h2 class="font-semibold text-gray-700 mb-2">{{ Str::limit($course->title, 25) }}</h2>
            <p class="text-gray-500 text-sm mt-auto mb-2">
                Por {{$course->teacher->name}}
            </p>

            <div>
                <ul class="flex text-xs mb-2">
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
        </div>
    </a>
</article>
