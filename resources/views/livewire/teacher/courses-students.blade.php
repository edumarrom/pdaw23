@section('title')
    Alumnos matriculados - Editando: {{ $course->title }} - Profesores | Dabaliu
@endsection
<div>

    <div class="container py-8 grid grid-cols-5 gap-2">

        @include('teacher.includes.courses.aside')

        <div class="card col-span-4">

            <div class="px-6 py4">
                <h2 class="text-2xl font-bold">
                    <i class="fa-solid fa-users mr-1"></i>
                    Alumnos matriculados
                </h2>
                <hr class="mt-2 mb-6">
            </div>

            <div class="relative overflow-x-auto mt-6 shadow-md sm:rounded-lg border border-gray-100">
                {{-- Buscador --}}
                <div class="{{-- flex items-center justify-between flex-column flex-wrap md:flex-row --}} space-y-4 md:space-y-0 p-4 bg-white">
                    <label for="table-search" class="sr-only">Buscar</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fa fa-solid fa-search text-gray-500"></i>
                        </div>
                        <input id="table-search-courses" type="search" wire:model.live.debounce.750ms="search" placeholder="Buscar un alumno"
                            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>

                @if ($students->count())
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Alumno
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                {{-- <th scope="col" class="px-6 py-3">
                                    Progreso
                                </th> --}}
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($students as $student)

                                <tr class="bg-white @if(!$loop->last) border-b @endif hover:bg-gray-50">
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                        <figure class="mr-2">
                                            <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$student->profile_photo_url}}" alt="">
                                        </figure>
                                        <div class="ps-3">
                                            <div class="text-base font-medium">{{ $student->name }}</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $student->email }}
                                    </td>

                                    {{-- <td class="px-6 py-4">
                                        <!-- Happy path: {{ $student->advance($course) }}% completado -->
                                    </td> --}}

                                    <td class="px-6 py-4">
                                        {{-- enlace centrado dentro de la celda con href="mailto:" --}}
                                        <a href="mailto:{{ $student->email }}"
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 hover:bg-indigo-200 hover:text-indigo-900">
                                            <i class="fa-solid fa-envelope mr-1"></i>
                                            Enviar email
                                        </a>
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>

                    <div class="mt-6 mb-4 mx-6">
                        {{ $students->links() }}
                    </div>
                @else
                    <div class="flex items-center justify-center p-4">
                        <div class="flex flex-col items-center">
                            <i class="fa-regular fa-face-sad-tear text-8xl text-gray-200 mb-6"></i>
                            {{-- <img class="w-64 h-auto mb-4" src="{{ asset('img/tumbleweed.png') }}" alt=""> --}}
                            <h3 class="text-lg font-bold text-gray-600">
                                @if ($search)
                                    No hay alumnos que coincidan con "{{ $search }}".
                                @else
                                    No hay ningún alumno matriculado en este curso.
                                @endif
                            </h3>
                        </div>
                    </div>
                @endif

            </div>

        </div>

    </div>

</div>
