<x-admin-layout>
    <div class="container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Editar rol</h1>
        </div>

        <form action="{{ route('admin.roles.update', $role) }}" method="post"
            class="bg-white rounded-lg p-6 shadow-lg">
            @method('PUT')
            @csrf

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label for="name" class="mb-2" value="Nombre" />
                <x-input name="name"
                         type="text"
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         required
                         placeholder="Escribe un nombre para este rol"
                         value="{{old('name', $role->name)}}" />
            </div>

            <div class="relative overflow-x-auto rounded-lg shadow-xl">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">
                                Create
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Read
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Update
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Delete
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($permissions as $key => $value)
                            <tr class="border-b border-gray-200">
                                <td class="px-6 py-3 font-medium text-gray-700 capitalize">
                                    {{ $key }}
                                </td>
                                @foreach ($value as $permissions)
                                    <td class="px-6 py-3">
                                        <x-checkbox name="permissions[]"
                                                    class="mr-1 !text-blue-600 focus:!ring-blue-500"
                                                    value="{{ $permissions['id'] }}"
                                                    :checked="in_array($permissions['id'], old('permissions', []))"
                                                    :checked="in_array($permissions['id'], old('permissions', $role->permissions->pluck('id')->toArray()))" />
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-between mt-16">
                <x-link-button href="{{ route('admin.roles.index') }}">
                    <i class="fa-solid fa-xmark mr-2"></i>
                    Cancelar
                </x-link-button>

                <x-button color="blue">
                    <i class="fa-solid fa-save mr-2"></i>
                    Guardar
                </x-button>
            </div>
        </form>
    </div>
</x-admin-layout>
