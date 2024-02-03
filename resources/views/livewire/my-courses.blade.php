<div class="container">

    <div class="flex flex-col justify-between mt-24 md:flex-row">
        <h1 class="mb-4 text-3xl font-bold text-gray-700">Mis cursos</h1>
        <div class="flex items-center justify-between flex-column" >
            <label for="table-search" class="sr-only">Buscar</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="fa fa-solid fa-search text-gray-500"></i>
                </div>
                <input id="table-search-courses" type="search" wire:model.live.debounce.750ms="search" placeholder="Buscar un curso"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>
    </div>


    <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">

        @foreach ($courses as $course)
            <x-course-card-min :course="$course"></x-course-card-min>
        @endforeach
</div>

<div class="mt-8">
    {{ $courses->links(data: ['scrollTo' => false]) }}
</div>
