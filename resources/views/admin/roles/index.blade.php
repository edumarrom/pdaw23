<x-admin-layout>

    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Roles</h1>
        <x-link-button href="{{ route('admin.roles.create') }}"
            class="bg-blue-500 rounded hover:bg-blue-600">
            <i class="fa-solid fa-plus mr-2"></i>
            Nuevo
        </x-link-button>
    </div>

</x-admin-layout>
