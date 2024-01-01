<div>
    {{-- Buscador --}}
    <div class="card rounded-lg shadow-md mb-4">
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <i class="fa fa-solid fa-search text-gray-500"></i>
            </div>
            <input id="table-search-users" type="search" wire:model.live.debounce.750ms="search" placeholder="Buscar un usuario"
                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full focus:ring-blue-500 focus:border-blue-500">
        </div>
    </div>

    @if ($users->count())
        <div class="relative overflow-x-auto rounded-lg shadow-xl">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-blue-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Roles
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $user->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                @foreach ($user->roles as $role)

                                    @switch($role->id)
                                        @case(1)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $role->name }}
                                            </span>
                                            @break
                                        @case(2)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                {{ $role->name }}
                                            </span>
                                            @break
                                        @case(3)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-teal-100 text-teal-800">
                                                {{ $role->name }}
                                            </span>
                                            @break
                                        @default
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                {{ $role->name }}
                                            </span>
                                    @endswitch
                                @endforeach


                            <td class="px-6 py-4">
                                <a href="{{ route('admin.users.edit', $user) }}" class="inline-block hover:text-gray-700">
                                    <i class="fa-solid fa-pen"></i>
                                    Editar
                                </a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="post"
                                    id='delete-form-{{ $user->id }}'>
                                    @csrf
                                    @method('delete')
                                    <button type="button" class=" text-rose-500 hover:text-rose-700"
                                        onclick="deleteUser({{ $user->id }})">
                                        <i class="fa-solid fa-trash"></i>
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    @else
        <div class="flex items-center justify-center p-4">
            <div class="flex flex-col items-center">
                <img class="w-64 h-auto mb-4" src="{{ asset('img/tumbleweed.png') }}" alt="">
                {{-- Source: https://www.creativefabrica.com/product/cactus-tumbleweed-2/ref/154380/ --}}
                <h3 class="text-lg font-bold text-gray-600">No hay usuarios que coincidan con tu búsqueda</h3>
            </div>
        </div>
    @endif
</div>
