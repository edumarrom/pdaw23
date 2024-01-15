<x-admin-layout>

    <div class="container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Cursos</h1>
        </div>

        @livewire('admin.courses-index')

    </div>

    @push('scripts')

        <script>
            window.addEventListener('swal', event => {
                const detail = event.detail[0];
                Swal.fire({
                    icon: detail.icon,
                    title: detail.title,
                    text: detail.text,
                    confirmButtonColor: detail.confirmButtonColor,
                })
            })
        </script>

        <script>
            function suspendCourse(courseId) {
                const form = document.querySelector('#suspend-form-' + courseId);
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
