<div>

    <div class="relative overflow-x-auto rounded-lg shadow-xl">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-blue-100">
                <tr class="bg-blue-200 border-b border-gray-300">
                    <td colspan="3" class="px-6 py-3">

                        <div class="relative">
                            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                <i class="fa fa-solid fa-search text-gray-500"></i>
                            </div>
                            <input id="table-search-users" type="search" wire:model.live.debounce.750ms="search" placeholder="Buscar un curso"
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500">
                        </div>

                    </td>
                    <td class="px-6 py-3">
                        <x-select id="status"
                                name="status"
                                class="block w-full"
                                wire:model.live="status">
                            <option value="">Todos</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status['id'] }}">{{ $status['name'] }}</option>
                            @endforeach
                        </x-select>
                    </td class="px-6 py-3">
                    <td class="px-6 py-3"></td>
                </tr>
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Título
                    </th>
                    <th scope="col" class="wpx-6 py-3">
                        Profesor
                    </th>
                    <th scope="col" class="wpx-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="wpx-6 py-3 md:w-1/3 lg:w-1/12">
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
                        <td class="px-6 py-4">
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
</div>
