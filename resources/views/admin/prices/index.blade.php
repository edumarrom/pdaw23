<x-admin-layout>

    <div class="md:container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Precios</h1>
            <x-link-button href="{{ route('admin.prices.create') }}" color="blue">
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
                        <th scope="col" class="px-6 py-3">
                            Importe
                        </th>
                        <th scope="col" class="px-6 py-3 md:w-1/3 lg:w-1/6">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prices as $price)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $price->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $price->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $price->value }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.prices.edit', $price) }}" class="hover:text-gray-700">
                                    <i class="fa-solid fa-pen"></i>
                                    Editar
                                </a>
                                <form action="{{ route('admin.prices.destroy', $price) }}" method="post"
                                    id='delete-form-{{ $price->id }}'>
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="text-rose-500 hover:text-rose-700"
                                        onclick="destroy({{ $price->id }})">
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
            function destroy(elementId) {
                const form = document.querySelector('#delete-form-' + elementId);
                Swal.fire({
                    icon: 'warning',
                    iconColor: '#f43f5e',
                    title: '¿Estás seguro?',
                    text: "Esta acción es irreversible",
                    showCancelButton: true,
                    confirmButtonText: 'Confirmar',
                    confirmButtonColor: '#f43f5e',
                    cancelButtonText: 'Cancelar',
                    cancelButtonColor: '#1f2937',

                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit()
                    }
                })
            }
        </script>
    @endpush
</x-admin-layout>
