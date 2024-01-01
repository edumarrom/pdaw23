<x-admin-layout>
    <div class="container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Editar Usuario</h1>
        </div>

        <form action="{{ route('admin.users.update', $user) }}" method="post"
            class="bg-white rounded-lg p-6 shadow-lg">
            @method('PUT')
            @csrf

            <x-validation-errors class="mb-4" />

            <div class="mb-4">
                <x-label for="name" class="mb-2" value="Nombre" />
                <x-input id="name"
                         name="name"
                         type="text"
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         required
                         placeholder="Escribe un nombre para este usuario"
                         value="{{old('name', $user->name)}}" />
            </div>

            <div class="mb-4">
                <x-label for="email" class="mb-2" value="Email" />
                <x-input id="email"
                         name="email"
                         type="email"
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         required
                         placeholder="Escribe un email para este usuario"
                         value="{{old('email', $user->email)}}" />
            </div>

            <div class="mb-4">
                <x-label for="password" class="mb-2" value="Contraseña" />
                <x-input name="password"
                         type="password"
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         placeholder="Escribe la nueva contraseña del usuario" />
            </div>

            <div class="mb-4">
                <x-label for="password_confirmation" class="mb-2" value="Confirmar contraseña" />
                <x-input name="password_confirmation"
                         type="password"
                         class="block w-full mb-2 focus:!border-blue-500 focus:!ring-blue-500"
                         placeholder="Confirma la contraseña" />
            </div>

            <div class="mb-4">
                <x-label for="roles" class="mb-2" value="Roles" />
                <ul id="roles">
                    @foreach ($roles as $role)
                        <li class="mb-2">
                            <x-label>
                                <x-checkbox name="roles[]"
                                            class="mr-1 !text-blue-600 focus:!ring-blue-500"
                                            value="{{ $role->id }}"
                                            :checked="in_array($role->id, old('roles', $user->roles->pluck('id')->toArray()  ))"/>
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
</x-admin-layout>
