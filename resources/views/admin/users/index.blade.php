<x-admin-layout>

    <div class="md:container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Usuarios</h1>
            <x-link-button href="{{ route('admin.users.create') }}" color="blue">
                <i class="fa-solid fa-plus mr-2"></i>
                Nuevo
            </x-link-button>
        </div>

        {{-- Tabla de usuarios --}}
        @livewire('admin.users-index')
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
