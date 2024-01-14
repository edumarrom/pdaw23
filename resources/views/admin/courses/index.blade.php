<x-admin-layout>

    <div class="container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Cursos</h1>
        </div>

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
                        <th scope="col" class="wpx-6 py-3">
                            Profesor
                        </th>
                        <th scope="col" class="wpx-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="wpx-6 py-3 {{-- md:w-1/3 lg:w-1/6 --}}">
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
                                ...
                                {{-- <a href="{{ route('admin.courses.edit', $course) }}">
                                    <i class="fa-solid fa-pen"></i>
                                    Editar
                                </a>
                                <form action="{{ route('admin.courses.destroy', $course) }}" method="post"
                                    id='delete-form-{{ $course->id }}'>
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="text-red-500"
                                        onclick="deletecourse({{ $course->id }})">
                                        <i class="fa-solid fa-trash"></i>
                                        Borrar
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</x-admin-layout>
