<nav class="bg-gray-200 py-4 border-b-2 border-gray-300">
    <div class="container">

        <div class="flex space-x-2">

            <h3 class="inline-flex items-center text-xl text-gray-700">Filtrar por: </h3>

            <button class="bg-white text-gray-700 rounded shadow h-10 px-4"
                    wire:click="resetFilters">Todos los cursos</button>

            <x-dropdown align="left">
                <x-slot name="trigger">
                        <span class="inline-flex rounded-md">
                        <button class="inline-flex items-center bg-white text-gray-700 rounded shadow h-10 px-4">
                            Categoría

                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                </x-slot>

                <x-slot name="content">
                    @foreach ($categories as $category)
                        <x-dropdown-link class="cursor-pointer"
                            wire:click="$set('category_id', {{$category->id}})">
                            {{ $category->name }}
                        </x-dropdown-link>
                    @endforeach
                </x-slot>
            </x-dropdown>

            <x-dropdown align="left">
                <x-slot name="trigger">
                        <span class="inline-flex rounded-md">
                        <button class="inline-flex items-center bg-white text-gray-700 rounded shadow h-10 px-4">
                            Nivel

                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                </x-slot>

                <x-slot name="content">
                    @foreach ($levels as $level)
                        <x-dropdown-link class="cursor-pointer"
                            wire:click="$set('level_id', {{$level->id}})">
                            {{ $level->name }}
                        </x-dropdown-link>
                    @endforeach
                </x-slot>
            </x-dropdown>
        </div>

    </div>
</nav>
