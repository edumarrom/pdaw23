<x-admin-layout>
    <div class="container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Nuevo rol</h1>
        </div>

        <form action="{{ route('admin.roles.store') }}" method="post"
            class="bg-white rounded-lg p-6 shadow-lg">
            @csrf

            <x-validation-errors class="mb-4"/>

            <div class="mb-4">
                <x-label for="name" class="mb-2" value="Nombre" />
                <x-input name="name"
                         type="text"
                         required
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         placeholder="Escribe el nombre del nuevo rol"
                         value="{{old('name')}}" />
            </div>

            <div class="mb-4">
                <p class="mb-2 font-medium text-sm text-gray-700">Permisos</p>
                <ul>
                    @foreach ($permissions as $permission)

                    <li class="mb-2">

                        <x-label>
                            <x-checkbox name="permissions[]"
                                        class="mr-1 !text-blue-600 focus:!ring-blue-500"
                                        value="{{ $permission->id }}"
                                        :checked="in_array($permission->id, old('permissions', []))"
                            />
                                {{ $permission->name }}
                        </x-label>
                    @endforeach
                </ul>
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
