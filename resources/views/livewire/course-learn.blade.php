<div class="mt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-3 gap-8">

        {{-- Columna izquierda--}}
        <div class="col-span-2">

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

            <ul>
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
                                    <a href="">
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
