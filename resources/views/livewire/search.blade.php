<div>
    <form class="pt-2 relative mx-auto" autocomplete="off">
        <div class="pt-2 relative mx-auto text-gray-600">

            <input class=" w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none focus:ring-indigo-500"
                    type="search"
                    name="search"
                    placeholder="Vue para principantes..."
                    wire:model.live.debounce.500="search">
            <x-button type="button" class="absolute rounded-l-none right-0 top-0 h-10 mt-2 cursor-auto">Buscar</x-button>

            @if ($search)
                <ul class="absolute w-full left-0 mt-1 text-sm overflow-hidden bg-white rounded-md shadow-md">
                    @forelse ($this->results as $result)
                        <li class="leading-8 pl-2 hover:bg-gray-100">
                            <a href="{{ route('courses.show', $result) }}"
                                    class="block cursor-pointer">
                                {{ $result->title }}
                            </a>
                        </li>
                    @empty
                        <li class="leading-8 pl-2 hover:bg-gray-100">
                            No se encontraron resultados para "{{ $search }}"
                        </li>
                    @endforelse
                </ul>
            @endif

        </div>
    </form>
</div>
