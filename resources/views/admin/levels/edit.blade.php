<x-admin-layout>
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Editar nivel</h1>
    </div>

    <form action="{{ route('admin.levels.update', $level) }}" method="post"
        class="bg-gray-100 rounded-lg p-6 shadow-lg">
        @method('PUT')
        @csrf

        <x-validation-errors class="mb-4" />

        <div class="mb-4">
            <x-label class="mb-2">
                Nombre
            </x-label>
            <x-input name="name"
                     class="w-full"
                     placeholder="Escribe un nombre para este nivel"
                     value="{{old('name', $level->name)}}" />
        </div>

        <div class="flex justify-between mt-16">
            <x-link-button href="{{ url()->previous() }}">
                <i class="fa-solid fa-xmark mr-2"></i>
                Cancelar
            </x-link-button>

            <x-button class="bg-blue-500 rounded hover:bg-blue-600">
                <i class="fa-solid fa-save mr-2"></i>
                Guardar
            </x-button>
        </div>
    </form>
</x-admin-layout>
