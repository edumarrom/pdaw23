@section('title', 'Dashboard - Administración | Dabaliu')
<x-admin-layout>

    <div class="container">
        <div class="mb-4">
            <h1 class="text-3xl font-bold">Dashboard</h1>
        </div>


        <div class="mb-4">
            <h2 class="text-xl text-gray-700 font-bold">Cursos</h2>
        </div>

        <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">

            <div class="card relative overflow-hidden rounded-lg p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <a href="{{ route('admin.courses.index')}}">
                    <dt>
                        <i class="fa-solid fa-book inline-block text-5xl w-12 h-12 text-gray-200 absolute top-1 right-0"></i>
                        <p class="truncate text-sm font-medium text-gray-500">Cursos en total</p>
                    </dt>
                    <dd class="flex items-baseline">
                        <p class="text-3xl font-semibold text-blue-800">{{ $courses->count() }}</p>
                    </dd>
                </a>
            </div>

            <div class="card relative overflow-hidden rounded-lg p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <dt>
                    <i class="fa-solid fa-file-circle-exclamation inline-block text-5xl w-14 h-14 text-gray-200 absolute top-1 right-0"></i>
                    <p class="truncate text-sm font-medium text-gray-500">En borrador</p>
                </dt>
                <dd class="flex items-baseline">
                    <p class="text-3xl font-semibold text-blue-800">{{ $courses->where('status', 1)->count() }}</p>
                </dd>
            </div>

            <div class="card relative overflow-hidden rounded-lg p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <dt>
                    <i class="fa-solid fa-file-circle-question inline-block text-5xl w-14 h-14 text-gray-200 absolute top-1 right-0"></i>
                    <p class="truncate text-sm font-medium text-gray-500">En revisión</p>
                </dt>
                <dd class="flex items-baseline">
                    <p class="text-3xl font-semibold text-blue-800">{{ $courses->where('status', 2)->count() }}</p>
                </dd>
            </div>

            <div class="card relative overflow-hidden rounded-lg p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <dt>
                    <i class="fa-solid fa-file-circle-check inline-block text-5xl w-14 h-14 text-gray-200 absolute top-1 right-0"></i>
                    <p class="truncate text-sm font-medium text-gray-500">Publicados</p>
                </dt>
                <dd class="flex items-baseline">
                    <p class="text-3xl font-semibold text-blue-800">{{ $courses->where('status', 3)->count() }}</p>
                </dd>
            </div>
        </div>

        <div class="mb-4">
            <h2 class="text-xl text-gray-700 font-bold">Usuarios</h2>
        </div>

        <div class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            <div class="card relative overflow-hidden rounded-lg p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <a href="{{ route("admin.users.index") }}">
                    <dt>
                        <i class="fa-solid fa-users inline-block text-5xl w-16 h-16 text-gray-200 absolute top-1 right-0"></i>
                        <p class="truncate text-sm font-medium text-gray-500">Usuarios registrados</p>
                    </dt>
                    <dd class="flex items-baseline">
                        <p class="text-3xl font-semibold text-blue-800">{{ $users->count() }}</p>
                    </dd>
                </a>
            </div>

            <div class="card relative overflow-hidden rounded-lg p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <dt>
                    <i class="fa-solid fa-user-tie inline-block text-5xl w-12 h-12 text-gray-200 absolute top-1 right-0"></i>
                    <p class="truncate text-sm font-medium text-gray-500">Administradores</p>
                </dt>
                <dd class="flex items-baseline">
                    <p class="text-3xl font-semibold text-blue-800">{{ $adminsCount }}</p>
                </dd>
            </div>

            <div class="card relative overflow-hidden rounded-lg p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <dt>
                    <i class="fa-solid fa-chalkboard-user inline-block text-5xl w-16 h-16 text-gray-200 absolute top-1 right-0"></i>
                    <p class="truncate text-sm font-medium text-gray-500">Profesores</p>
                </dt>
                <dd class="flex items-baseline">
                    <p class="text-3xl font-semibold text-blue-800">{{ $teachersCount }}</p>
                </dd>
            </div>

            <div class="card relative overflow-hidden rounded-lg p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <dt>
                    <i class="fa-solid fa-graduation-cap inline-block text-5xl w-16 h-16 text-gray-200 absolute top-1 right-0"></i>
                    <p class="truncate text-sm font-medium text-gray-500">Estudiantes</p>
                </dt>
                <dd class="flex items-baseline">
                    <p class="text-3xl font-semibold text-blue-800">{{ $studentsCount }}</p>
                </dd>
            </div>

            {{-- <div class="card relative overflow-hidden rounded-lg p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <dt>
                    <i class="fa-solid fa-globe inline-block text-5xl w-16 h-16 text-gray-200 absolute top-1 right-0"></i>
                    <p class="truncate text-sm font-medium text-gray-500">En línea</p>
                </dt>
                <dd class="flex items-baseline">
                    @todo: lograr saber el nº de usuarios en línea
                    <p class="text-3xl font-semibold text-blue-800">{{ $studentsCount }}</p>
                </dd>
            </div> --}}
        </div>
    </div>

</x-admin-layout>
