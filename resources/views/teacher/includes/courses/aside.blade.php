@php
    $links = [
        [
            'name' => 'Información del curso',
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

<aside class="text-gray-800">
    <p class="text-2xl font-medium text-gray-900 mb-4">Menú de edición</p>

    <ul class="text-lg">

        @foreach ($links as $link)
                <li>
                    <a  href="{{ $link['route'] }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200 hover:cursor-pointer
                            {{ $link['active'] ? 'text-indigo-500' : '' }}">
                        <i class="mr-3 text-xl {{ $link['active'] ? 'text-indigo-500' : 'text-gray-500' }} {{$link['icon']}}"></i>
                        <span class="">{{ $link['name'] }}</span>
                    </a>
                </li>
        @endforeach
    </ul>
</aside>
