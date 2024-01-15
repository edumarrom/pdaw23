@php
    $links = [
        [
            'name' => 'Información básica',
            'route' => route('teacher.courses.edit', $course),
            'icon' => 'fa-solid fa-info-circle',
            'active' => request()->routeIs('teacher.courses.edit'),
        ],
        [
            'name' => 'Contenido del curso',
            'route' => route('teacher.courses.edit.content', $course),
            'icon' => 'fa-solid fa-book',
            'active' => request()->routeIs('teacher.courses.edit.content'),
        ],
        [
            'name' => 'Metas y requisitos',
            'route' => route('teacher.courses.edit.goals', $course),
            'icon' => 'fa-solid fa-list-check',
            'active' => request()->routeIs('teacher.courses.edit.goals'),
        ],
        [
            'name' => 'Alumnos matriculados',
            'route' => route('teacher.courses.edit.students', $course),
            'icon' => 'fa-solid fa-users',
            'active' => request()->routeIs('teacher.courses.edit.students'),
        ],
    ];
@endphp

<aside class="text-gray-700 mr-2">

    <h1 class="text-sm mb-1">
        <span class="inline-block font-semibold">Editando:</span>
        <span class="inline-block">{{ $course->title }}</span>
    </h1>

    <div class="text-sm mb-2">
        <div class="flex">
            <span class="font-semibold">Estado:</span>
            <span class="ml-2">
                @switch($course->status)
                    @case(1)
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-rose-500 me-2"></div> Borrador
                        </div>
                        @break
                    @case(2)
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-amber-500 me-2"></div> Pendiente
                        </div>
                        @break
                    @case(3)
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Publicado
                        </div>
                        @break
                    @default
                @endswitch
            </span>
        </div>
    </div>

    @if ($course->status == 1)
        <div class="mb-2">
            <form action="{{ route('teacher.courses.edit.status', $course) }}" method="post">
                @csrf

                <x-button color="indigo" class="!py-1 w-full justify-center items-center">
                    <i class="fa-solid fa-eye text-sm mr-1"></i>
                    Solicitar revisión
                </x-button>
            </form>
        </div>
    @endif

    <hr class="mt-4 mb-2 border-2">

    <ul class="text-md">
        @foreach ($links as $link)
                <li>
                    <a  href="{{ $link['route'] }}"
                            class="flex items-center px-2 py-1 mb-1 text-sm rounded-lg hover:bg-gray-200 hover:cursor-pointer
                            @if ($link['active']) font-semibold text-gray-800 bg-gray-200  @else  @endif">
                        <i class="mr-2 text-lg   {{$link['icon']}}"></i>
                        <span class="">{{ $link['name'] }}</span>
                    </a>
                </li>
        @endforeach
    </ul>

    <hr class="mt-2 mb-4 border-2">

    <x-link-button href="{{ route('teacher.courses.index') }}" color="white" class="mb-4">
        <i class="fa-solid fa-arrow-left mr-1"></i>
        Volver al listado de cursos
    </x-link-button>
</aside>
