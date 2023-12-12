º<x-app-layout>
    <section class="bg-cover {{-- bg-right-top bg-no-repeat --}} py-12" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url({{Storage::url($course->image->path) }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-80 w-full object-cover rounded border-4 border-gray-300 border-s-white" src="{{Storage::url($course->image->path)}}" alt="">
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
</x-app-layout>
