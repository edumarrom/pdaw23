<div>

    <div class="relative overflow-x-auto rounded-lg shadow-xl">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-blue-100">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Foto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="wpx-6 py-3 md:w-1/3 lg:w-1/6">
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
                            <img class="w-auto h-12 rounded-full" src="{{ $user->profile_photo_url }}" alt="">
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.users.edit', $user) }}">
                                <i class="fa-solid fa-pen"></i>
                                Editar
                            </a>
                            {{-- <form action="{{ route('admin.users.destroy', $user) }}" method="post"
                                id='delete-form-{{ $user->id }}'>
                                @csrf
                                @method('delete')
                                <button type="button" class="text-red-500"
                                    onclick="deleteUser({{ $user->id }})">
                                    <i class="fa-solid fa-trash"></i>
                                    Borrar
                                </button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $users->links() }}
    </div>

</div>
