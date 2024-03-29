@section('title', 'Nuevo precio - Administración | Dabaliu')
<x-admin-layout>
    <div class="md:container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Nuevo precio</h1>
        </div>

        <form id="price-form" action="{{ route('admin.prices.store') }}" method="post"
            class="card rounded-lg p-6 shadow-lg">
            @csrf

            <div class="mb-4">
                <x-label for="name" class="mb-2" value="Nombre" />
                <x-input id="name"
                         name="name"
                         type="text"
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         placeholder="Escribe un nombre para este precio"
                         value="{{old('name')}}" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-label for="value" class="mb-2" value="Importe" />
                <x-input id="value"
                         name="value"
                         type="text"
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         placeholder="Escribe un importe para este precio"
                         value="{{old('value')}}" />
                <x-input-error for="value" class="mt-2" />
            </div>

            <div class="flex justify-between mt-16">
                <x-link-button href="{{ route('admin.prices.index') }}">
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
        <script src="{{Vite::asset('resources/js/admin/prices/validation.js')}}"></script>
    @endpush

</x-admin-layout>
