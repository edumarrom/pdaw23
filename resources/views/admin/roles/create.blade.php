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
                <x-label class="mb-2">
                    Nombre
                </x-label>
                <x-input
                    name="name"
                    class="w-full"
                    placeholder="Escribe el nombre del nuevo rol"
                    value="{{old('name')}}"/>
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
