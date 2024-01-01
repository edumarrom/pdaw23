<x-admin-layout>

    <div class="container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Usuarios</h1>
            <x-link-button href="{{ route('admin.users.create') }}" color="blue">
                <i class="fa-solid fa-plus mr-2"></i>
                Nuevo
            </x-link-button>
        </div>

        {{-- Tabla de usuarios --}}
        @livewire('admin-users')
    </div>

    @push('scripts')
        <script>
            function deleteUser(userId) {
                const form = document.querySelector('#delete-form-' + userId);
                Swal.fire({
                    icon: 'warning',
                    title: '¿Estás seguro?',
                    text: "Esta acción es irreversible",
                    showCancelButton: true,
                    confirmButtonText: 'Confirmar',
                    confirmButtonColor: '#EF4444',
                    cancelButtonText: 'Cancelar',

                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit()
                    }
                })
            }
        </script>
    @endpush

</x-admin-layout>
