<div class="container">

    <div class="flex items-center justify-between mt-24">
        <h2 class="text-3xl font-bold text-gray-700">Mis cursos</h2>
        <x-link-button href="{{ route('teacher.courses.create') }}"
            color="indigo" class="!text-sm !font-medium !tracking-normal capitalize ">
            <i class="fa fa-solid fa-plus mr-2"></i>
            Nuevo curso
        </x-link-button>
    </div>

    <div class="bg-white relative overflow-x-auto mt-6 shadow-md rounded-lg">
        {{-- Buscador --}}
        <div class="{{-- flex items-center justify-between flex-column flex-wrap md:flex-row --}} space-y-4 md:space-y-0 p-4 bg-white">
            <label for="table-search" class="sr-only">Buscar</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="fa fa-solid fa-search text-gray-500"></i>
                </div>
                <input id="table-search-courses" type="search" wire:model.live.debounce.750ms="search" placeholder="Buscar un curso"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>

        @if ($courses->count())
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
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
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-wrap">
                                <img class="w-auto h-20 aspect-[16/9] rounded object-cover object-center" src="{{ $course->imagePath }}" alt="">
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
                                <a class="inline-block mb-2 cursor-pointer text-gray-500 hover:text-gray-700"
                                    href="{{ route('teacher.courses.edit', $course) }}">
                                    <i class="fa-solid fa-pen mr-1"></i>Editar
                                </a>
                                <form action="{{ route('teacher.courses.destroy', $course) }}" method="post"
                                    id="delete-form-{{ $course->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="inline-block cursor-pointer text-rose-500 hover:text-rose-700"
                                        onclick="destroyCourse({{ $course->id }})">
                                        <i class="fa-solid fa-trash"></i>
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

            <div class="mt-6 mb-4 mx-6">
                {{ $courses->links() }}
            </div>
        @else
        <div class="flex items-center justify-center p-4">
            <div class="flex flex-col items-center">
                @if ($search)
                    <i class="fa-regular fa-face-sad-tear text-8xl text-gray-200 mb-6"></i>
                    <h3 class="text-lg font-bold text-gray-600">
                        No hay cursos que coincidan con "{{ $search }}".
                    </h3>
                @else
                    {{-- <img class="w-64 h-auto mb-4" src="{{ asset('img/tumbleweed.png') }}" alt=""> --}}
                    <i class="fa-solid fa-cloud-moon text-8xl text-gray-200 mb-6"></i>
                    <h3 class="text-lg font-bold text-gray-600">
                            Esto está muy tranquilo. Demasiado...
                    </h3>
                @endif
            </div>
        </div>
        @endif

    </div>

    @push('scripts')

        <script>
            window.addEventListener('swal', event => {
                const detail = event.detail[0];
                Swal.fire({
                    icon: detail.icon,
                    title: detail.title,
                    text: detail.text,
                    confirmButtonColor: detail.confirmButtonColor,
                })
            })
        </script>

        <script>
            function destroyCourse(courseId) {
                const form = document.querySelector('#delete-form-' + courseId);
                Swal.fire({
                    icon: 'warning',
                    title: '¿Estás seguro?',
                    text: "Esta acción es irreversible",
                    showCancelButton: true,
                    confirmButtonText: 'Confirmar',
                    confirmButtonColor: '#EF4444',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            }
        </script>

    @endpush
</div>
