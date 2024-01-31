<x-admin-layout>
    <div class="md:container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Editar nivel</h1>
        </div>

        <form id="level-form" action="{{ route('admin.levels.update', $level) }}" method="post"
            class="card rounded-lg p-6 shadow-lg">
            @method('PUT')
            @csrf

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label for="name" class="mb-2" value="Nombre" />
                <x-input id="name"
                         name="name"
                         type="text"
                         required
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         placeholder="Escribe un nombre para este nivel"
                         value="{{old('name', $level->name)}}" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="flex justify-between mt-16">
                <x-link-button href="{{ route('admin.levels.index') }}">
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
        <script src="{{Vite::asset('resources/js/admin/levels/validation.js')}}"></script>
    @endpush
</x-admin-layout>
