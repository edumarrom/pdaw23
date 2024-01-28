<div>

    <div class="card rounded-lg shadow-md mb-4">
        <div class="flex items-center justify-between flex-column {{-- flex-wrap --}} " >
            <label for="table-search" class="sr-only">Buscar</label>
            <div class="relative w-full mr-4">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="fa fa-solid fa-search text-gray-500"></i>
                </div>
                <input id="table-search-courses" type="search" wire:model.live.debounce.750ms="search" placeholder="Buscar un curso"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <x-dropdown align="right">
                    <x-slot name="trigger">
                        <span class="inline-flex rounded-md">
                            {{-- inline-flex items-center bg-white text-gray-700 rounded shadow h-10 px-4 --}}
                            <button class="py-2 px-4 inline-flex items-center text-sm text-gray-900 border border-gray-300 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500">
                                @switch($status)
                                    @case('')
                                        Estado
                                        @break
                                    @case(1)
                                        Borrador
                                        @break
                                    @case(2)
                                        Pendiente
                                        @break
                                    @case(3)
                                        Publicado
                                        @break
                                    @default
                                @endswitch

                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </span>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link class="cursor-pointer"
                            wire:click="$set('status', '')">
                            Todos
                        </x-dropdown-link>
                        @foreach ($statuses as $status)
                            <x-dropdown-link class="cursor-pointer"
                                wire:click="$set('status', {{$status['id']}})">
                                {{ $status['name'] }}
                            </x-dropdown-link>
                        @endforeach
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>

    @if ($courses->count())
        <div class="relative overflow-x-auto rounded-lg shadow-xl">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-blue-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Título
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Profesor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3 md:w-1/3 lg:w-1/12">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $course->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $course->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $course->teacher->name }}
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
                            <td class="px-4 py-2">
                                @switch($course->status)
                                    @case(2)
                                        <x-link-button href="{{ route('admin.courses.show', $course) }}"
                                                color="blue" class="w-full justify-center">
                                            <i class="fa-solid fa-eye mr-1"></i>
                                            Revisar
                                        </x-link-button>
                                        @break
                                    @case(3)
                                        <form action="{{ route('admin.courses.reject', $course) }}" method="post"
                                                id="suspend-form-{{ $course->id }}">
                                            @csrf
                                            <x-button type="button" color="rose" class="w-full justify-center"
                                                    onclick="suspendCourse({{ $course->id }})">
                                                <i class="fa-solid fa-eye-slash"></i>
                                                Suspender
                                            </x-button>
                                        </form>
                                        @break
                                    @default
                                @endswitch
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $courses->links() }}
        </div>
    @else
        <div class="flex items-center justify-center p-4">
            <div class="flex flex-col items-center">
                @if ($search)
                    <i class="fa-regular fa-face-sad-tear text-8xl text-gray-300 mb-6"></i>
                    <h3 class="text-lg font-bold text-gray-600">
                        No hay cursos que coincidan con "{{ $search }}".
                    </h3>
                @else
                    {{-- <img class="w-64 h-auto mb-4" src="{{ asset('img/tumbleweed.png') }}" alt=""> --}}
                    <i class="fa-solid fa-cloud-moon text-8xl text-gray-300 mb-6"></i>
                    <h3 class="text-lg font-bold text-gray-600">
                            Esto está muy tranquilo. Demasiado...
                    </h3>
                @endif
            </div>
        </div>
    @endif
</div>
