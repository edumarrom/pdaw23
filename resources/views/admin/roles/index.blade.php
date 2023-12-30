<x-admin-layout>

    <div class="container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Roles</h1>
            <x-link-button href="{{ route('admin.roles.create') }}" color="blue">
                <i class="fa-solid fa-plus mr-2"></i>
                Nuevo
            </x-link-button>
        </div>

        <div class="relative overflow-x-auto rounded-lg shadow-xl">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-blue-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $role->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $role->name }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.roles.edit', $role) }}">
                                    <i class="fa-solid fa-pen"></i>
                                    Editar
                                </a>
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="post"
                                    id='delete-form-{{ $role->id }}'>
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="text-red-500"
                                        onclick="deleteRole({{ $role->id }})">
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
            function deleteRole(roleId) {
                const form = document.querySelector('#delete-form-' + roleId);
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
