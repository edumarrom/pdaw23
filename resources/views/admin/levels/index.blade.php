<x-admin-layout>

    <div class="md:container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Niveles</h1>
            <x-link-button href="{{ route('admin.levels.create') }}" color="blue">
                <i class="fa-solid fa-plus mr-2"></i>
                Nuevo
            </x-link-button>
        </div>

        <div class="relative overflow-x-auto rounded-lg shadow-xl">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-blue-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 md:w-1/6 lg:w-1/12">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 md:w-1/3 lg:w-1/6">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levels as $level)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $level->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $level->name }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.levels.edit', $level) }}" class="hover:text-gray-700">
                                    <i class="fa-solid fa-pen"></i>
                                    Editar
                                </a>
                                <form action="{{ route('admin.levels.destroy', $level) }}" method="post"
                                    id='delete-form-{{ $level->id }}'>
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="text-rose-500 hover:text-rose-700"
                                        onclick="deleteLevel({{ $level->id }})">
                                        <i class="fa-solid fa-trash"></i>
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            function deleteLevel(levelId) {
                const form = document.querySelector('#delete-form-' + levelId);
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
                        form.submit()
                    }
                })
            }
        </script>
    @endpush
</x-admin-layout>
