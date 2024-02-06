@section('title')
    Editar rol: {{ $role->name }} - Administración | {{ config('app.name') }}
@endsection
<x-admin-layout>
    <div class="md:container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Editar rol</h1>
        </div>

        <form id="role-form" action="{{ route('admin.roles.update', $role) }}" method="post"
            class="bg-white rounded-lg p-6 shadow-lg">
            @method('PUT')
            @csrf

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label for="name" class="mb-2" value="Nombre" />
                <x-input id="name"
                         name="name"
                         type="text"
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         placeholder="Escribe un nombre para este rol"
                         value="{{old('name', $role->name)}}" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="mb-6 relative overflow-x-auto rounded-lg shadow-lg">
                <table class="w-full text-sm text-center text-gray-500">
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
                            <tr class="border-b border-gray-200">
                                <td class="px-6 py-3 font-medium text-left text-gray-700 capitalize">
                                    {{ __(Str::plural(Str::headline($key))) }}
                                </td>
                                @foreach ($value as $permissions)
                                    <td class="px-6 py-3">
                                        <x-checkbox name="permissions[]"
                                                    class="mr-1 !text-blue-600 focus:!ring-blue-500"
                                                    value="{{ $permissions['id'] }}"
                                                    :checked="in_array($permissions['id'], old('permissions', $role->permissions->pluck('id')->toArray()))" />
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mb-4">
                <p class="mb-2 font-medium text-xl text-gray-700">Otros permisos</p>
                <div class="card border border-gray-100 rounded-lg shadow-lg">
                    <ul class="px-4 py-2 columns-3xs">
                        @foreach ($otherPermissions as $permission)

                    <li class="mb-2">

                        <x-label>
                            <x-checkbox name="permissions[]"
                                        class="mr-1 !text-blue-600 focus:!ring-blue-500"
                                        value="{{ $permission->id }}"
                                        :checked="in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray()  ))" />
                                {{ $permission->name }}
                        </x-label>
                    @endforeach
                    </ul>
                </div>
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
        <script src="{{Vite::asset('resources/js/admin/categories/validation.js')}}"></script>
    @endpush
</x-admin-layout>
