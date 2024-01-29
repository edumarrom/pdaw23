<x-admin-layout>

    <div class="container">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Dashboard</h1>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">

            <div class="card relative overflow-hidden rounded-lg p-4 ">
                <a href="{{ route('admin.courses.index')}}">
                    <dt>
                        <i class="fa-solid fa-book inline-block text-5xl w-12 h-12 text-gray-200 absolute top-0 right-0"></i>
                        <p class="truncate text-sm font-medium text-gray-500">Cursos en revisión</p>
                    </dt>
                    <dd class="flex items-baseline">
                        <p class="text-3xl font-semibold text-blue-800">{{ $pendingCourses }}</p>
                    </dd>
                </a>
            </div>

            <div class="card relative overflow-hidden rounded-lg p-4 ">
                <dt>
                    <i class="fa-solid fa-users inline-block text-5xl w-16 h-16 text-gray-200 absolute top-0 right-0"></i>
                    <p class="truncate text-sm font-medium text-gray-500">Usuarios registrados</p>
                </dt>
                <dd class="flex items-baseline">
                    <p class="text-3xl font-semibold text-blue-800">{{ $users }}</p>
                </dd>
            </div>
            <div class="card"></div>
            <div class="card"></div>

        </div>
    </div>

</x-admin-layout>
