<div>

    <div class="relative overflow-x-auto rounded-lg shadow-xl">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-blue-100">
                <tr class="bg-blue-200 border-b border-gray-300">
                    <td class="px-6 py-3"></td>
                    <td class="px-6 py-3"></td>
                    <td class="px-6 py-3"></td>
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
                                    <x-link-button color="blue" class="w-full justify-center">
                                        <i class="fa-solid fa-eye mr-1"></i>
                                        Revisar
                                    </x-link-button>
                                    @break
                                @case(3)
                                    <x-link-button color="rose" class="w-full justify-center">
                                        <i class="fa-solid fa-eye-slash"></i>
                                        Suspender
                                    </x-link-button>
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
