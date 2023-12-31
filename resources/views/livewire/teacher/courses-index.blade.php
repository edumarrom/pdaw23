<div class="container">

    <div class="flex items-center justify-between mt-24">
        <h2 class="text-3xl font-bold text-gray-700">Mis cursos</h2>
        <x-link-button href="{{ route('teacher.courses.create') }}"
            color="indigo" class="!text-sm !font-medium !tracking-normal capitalize ">
            <i class="fa fa-solid fa-plus mr-2"></i>
            Nuevo curso
        </x-link-button>
    </div>

    <div class="relative overflow-x-auto mt-6 shadow-md sm:rounded-lg">
        {{-- Facetado --}}
        <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 p-4 bg-white">
            <div x-data="{open: false}" x-on:click.outside="open = false">
                <button x-on:click="open =!open" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5" type="button">
                    <span class="sr-only">Botón de acciones</span>
                    Acciones
                    <i class="fa-solid fa-chevron-down ml-2 text-xs"></i>
                </button>
                <!-- Dropdown menu -->
                <div x-show="open" x-transition class="absolute mt-1 ml-2 z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownActionButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Publicar</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Ocultar</a>
                        </li>
                    </ul>
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm rounded text-gray-700 hover:bg-red-200">Eliminar</a>
                    </div>
                </div>
            </div>
            <label for="table-search" class="sr-only">Buscar</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="fa fa-solid fa-search text-gray-500"></i>
                </div>
                <input id="table-search-courses" type="search" wire:model.live.debounce.750ms="search" placeholder="Buscar un curso"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>

        @if ($courses->count())
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox" wire:model.live="selectAll"
                                    class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 focus:ring-2">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Curso
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alumnos matriculados
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Valoraciones
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($courses as $course)

                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search" type="checkbox" wire:model.live="selected" value="{{ $course->id }}"
                                        class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 focus:ring-2">
                                    <label for="checkbox-table-search" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                <img class="w-auto h-20 rounded" src="{{ Storage::url($course->image->path) }}" alt="">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">{{ $course->title }}</div>
                                    <div class="font-normal text-gray-500">{{ $course->category->name }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $course->students->count() }}
                            </td>

                            <td class="px-6 py-4">

                                <div class="ps-3">

                                    <div class="flex">
                                        @if ($course->reviews_count > 0)
                                            <ul class="flex items-center text-sm">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($course->rating >= $i)
                                                        <i class="fa-solid fa-star text-yellow-500"></i>
                                                    @else
                                                        <i class="fa-solid fa-star text-gray-500"></i>
                                                    @endif
                                                @endfor
                                            </ul>
                                            <span class="text-xs text-gray-500 ml-2">
                                                    ({{ $course->rating }})
                                        @endif

                                        </span>
                                    </div>

                                    <div class="font-normal text-gray-500">
                                        @if ($course->reviews_count > 0)
                                            {{ $course->reviews_count }} valoraciones
                                        @else
                                            Sin valoraciones
                                        @endif
                                    </div>
                                </div>


                            </td>

                            <td class="px-6 py-4">
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
                            </td>
                            <td class="px-6 py-4">
                                <a class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 hover:text-gray-700 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5"
                                    href="{{ route('teacher.courses.edit', $course) }}">Editar</a>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
        @else
            <div class="flex items-center justify-center p-4">
                <div class="flex flex-col items-center">
                    <img class="w-64 h-auto mb-4" src="{{ asset('img/tumbleweed.png') }}" alt="">
                    {{-- Source: https://www.creativefabrica.com/product/cactus-tumbleweed-2/ref/154380/ --}}
                    <h3 class="text-lg font-bold text-gray-600">Esto está muy tranquilo, demasiado...</h3>
                </div>
            </div>
        @endif

    </div>

</div>
