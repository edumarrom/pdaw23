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

    <x-link-button href="{{ route('teacher.courses.index') }}" color="white" class="mb-4">
        <i class="fa-solid fa-arrow-left mr-1"></i>
        Volver al listado de cursos
    </x-link-button>

    <h1>
        <span class="inline-block font-semibold">Editando:</span>
        <span class="inline-block text-base mb-4">{{ $course->title }}</span>
    </h1>

    <ul class="text-md">

        @foreach ($links as $link)
                <li>
                    <a  href="{{ $link['route'] }}"
                            class="flex items-center p-2 mb-2 rounded-lg hover:cursor-pointer
                            @if ($link['active']) bg-indigo-500 text-white hover:bg-indigo-600 @else hover:bg-gray-200 @endif">
                        <i class="mr-2 text-xl   {{$link['icon']}}"></i>
                        <span class="">{{ $link['name'] }}</span>
                    </a>
                </li>
        @endforeach
    </ul>
</aside>
