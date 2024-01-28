<x-admin-layout>
    <div class="container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Nuevo usuario</h1>
        </div>

        <form id="user-form" action="{{ route('admin.users.store') }}" method="post"
            class="bg-white rounded-lg p-6 shadow-lg">
            @csrf

            <div class="mb-4">
                <x-label for="name" class="mb-2" value="Nombre" />
                <x-input id="name"
                         name="name"
                         type="text"
                         {{-- required --}}
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         placeholder="Escribe un nombre para este usuario"
                         value="{{old('name')}}" />
                <x-input-error for="name" />
            </div>

            <div class="mb-4">
                <x-label for="email" class="mb-2" value="Email" />
                <x-input id="email"
                         name="email"
                         type="text"
                         {{-- required --}}
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         placeholder="Escribe un email para este usuario"
                         value="{{old('email')}}" />
                <x-input-error for="email" />
            </div>

            <div class="mb-4">
                <x-label for="password" class="mb-2" value="Contraseña" />
                <x-input id="password"
                         name="password"
                         type="password"
                         {{-- required --}}
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         placeholder="Debe contener al menos 8 caracteres, un número y un símbolo." />
                <x-input-error for="password" />
            </div>

            <div class="mb-4">
                <x-label for="password_confirmation" class="mb-2" value="Confirmar contraseña" />
                <x-input id="password_confirmation"
                         name="password_confirmation"
                         type="password"
                         {{-- required --}}
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         placeholder="Confirma la contraseña" />
                <x-input-error for="password_confirmation" />
            </div>

            <div class="mb-4">
                <x-label for="roles" class="mb-2" value="Roles" />
                <ul id="roles" class="flex space-x-4">
                    @foreach ($roles as $role)
                        <li class="mb-2">
                            <x-label>
                                <x-checkbox name="roles[]"
                                            class="mr-1 !text-blue-600 focus:!ring-blue-500"
                                            value="{{ $role->id }}"
                                            :checked="in_array($role->id, old('roles', [] ))"/>
                                    {{ $role->name }}
                            </x-label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex justify-between mt-16">
                <x-link-button href="{{ route('admin.users.index') }}">
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
        <script src="{{Vite::asset('resources/js/users/validation.js')}}"></script>
    @endpush
</x-admin-layout>
