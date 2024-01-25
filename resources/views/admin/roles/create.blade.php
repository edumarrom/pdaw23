<x-admin-layout>
    <div class="container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Nuevo rol</h1>
        </div>

        <form id="role-form" action="{{ route('admin.roles.store') }}" method="post"
            class="bg-white rounded-lg p-6 shadow-lg">
            @csrf

            <div class="mb-4">
                <x-label for="name" class="mb-2" value="Nombre" />
                <x-input id="name"
                         name="name"
                         type="text"
                         required
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         placeholder="Escribe el nombre del nuevo rol"
                         value="{{old('name')}}" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="relative overflow-x-auto rounded-lg shadow-xl">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3"></th>
                            <th scope="col" class="px-6 py-3">
                                {{__('Create')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{__('Read')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{__('Update')}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{__('Delete')}}
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($permissions as $key => $value)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-3 font-medium text-gray-700 capitalize">
                                    {{ __(Str::plural(Str::headline($key))) }}
                                </td>
                                @foreach ($value as $permissions)
                                    {{-- @dd($permissions['id']) --}}
                                    <td class="px-6 py-3">
                                        <x-checkbox name="permissions[]"
                                                    class="mr-1 !text-blue-600 focus:!ring-blue-500"
                                                    value="{{ $permissions['id'] }}"
                                                    :checked="in_array($permissions['id'], old('permissions', []))" />
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
    @push('scripts')
        <script src="{{Vite::asset('resources/js/roles/validation.js')}}"></script>
    @endpush
</x-admin-layout>
