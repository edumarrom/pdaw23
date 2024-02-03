<div class="container">

    <div class="flex items-center justify-between mt-24">
        <h1 class="text-3xl font-bold text-gray-700">Mis cursos</h2>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">

        @foreach ($courses as $course)
            {{-- <article class="card text-gray-700 rounded-xl font-semibold overflow-hidden mb-8">
                <img src="{{$course->imagePath}}" alt="{{$course->title}}" class="mb-2">
                <div class="flex flex-col flex-1 mx-2">
                    <p class="text-lg font-semibold ">
                        {{$course->title}}
                    </p>
                    <p>Por {{ $course->teacher->name }}</p>

                    <div class="cursor-default">
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
            </article> --}}
            <x-course-card-min :course="$course"></x-course-card-min>
        @endforeach
</div>

<div class="mt-8">
    {{ $courses->links(data: ['scrollTo' => false]) }}
</div>
