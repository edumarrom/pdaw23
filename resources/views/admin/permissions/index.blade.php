<x-admin-layout>

    <div class="container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Permisos</h1>
            <x-link-button href="{{ route('admin.permissions.create') }}" color="blue">
                <i class="fa-solid fa-plus mr-2"></i>
                Nuevo
            </x-link-button>
        </div>


        @if ($permissions->count())
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
                            <th scope="col" class="wpx-6 py-3 md:w-1/3 lg:w-1/6">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $permission->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $permission->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.permissions.edit', $permission) }}">
                                        <i class="fa-solid fa-pen"></i>
                                        Editar
                                    </a>
                                    <form action="{{ route('admin.permissions.destroy', $permission) }}" method="post"
                                        id='delete-form-{{ $permission->id }}'>
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="text-red-500"
                                            onclick="deletePermission({{ $permission->id }})">
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
        @else
            <div class="flex items-center justify-center p-4">
                <div class="flex flex-col items-center">
                    <img class="w-64 h-auto mb-4" src="{{ asset('img/tumbleweed.png') }}" alt="">
                    {{-- Source: https://www.creativefabrica.com/product/cactus-tumbleweed-2/ref/154380/ --}}
                    <h3 class="text-lg font-bold text-gray-600">No hay permisos defindos</h3>
                </div>
            </div>
        @endif


    </div>

    @push('scripts')
        <script>
            function deletePermission(permissionId) {
                const form = document.querySelector('#delete-form-' + permissionId);
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
