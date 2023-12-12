<x-app-layout>
    <section class="bg-gray-700 py-12" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url({{ Storage::url($course->image->path) }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 gap-6">
            <figure>
                <img src="{{Storage::url($course->image->path)}}" alt="">
            </figure>

            <div>
                <h1 class="text-4xl text-white font-bold">{{$course->title}}</h1>
                <h2 class="text-lg text-white mt-2">{{$course->subtitle}}</h2>
                <ul class="text-lg text-white mt-8">
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
                                <i class="fa-solid fa-star text-white"></i>
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
</x-app-layout>
