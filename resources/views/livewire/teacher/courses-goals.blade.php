<div>
    <h2 class="text-2xl font-bold">
        <i class="fa-solid fa-graduation-cap mr-1"></i>
        Metas del curso
    </h2>
    <hr class="mt-2 mb-6">

    @if ($course->goals->count())

        {{-- ¿Por qué la ordenación no funciona? --}}
        @foreach ($course->goals->sortBy(['created_at', 'id desc']) as $item)

            <article class="card mb-6 border border-gray-100 shadow-md">

                <div class="px-6 py4">

                    <!-- Formulario de edición -->
                    @if ($goal->id == $item->id)
                        <form wire:submit.prevent="update" class="flex">
                            <x-input id="name"
                                    name="name"
                                    type="text"
                                    class="block w-full"
                                    placeholder="Escribe un nombre para esta meta"
                                    wire:model.live="goal.name" />
                            <x-input-error for="goal.name" class="ml-2" />

                            <x-secondary-button type="button" class="hover:bg-rose-600 hover:text-white ml-1"
                                    wire:click="cancel" title="Cancelar">
                                <i class="fa-solid fa-xmark"></i>
                            </x-secondary-button>
                            <x-secondary-button type="submit" class="hover:bg-indigo-500 hover:text-white ml-1"
                                    title="Guardar">
                                <i class="fa-solid fa-check"></i>
                            </x-secondary-button>
                        </form>
                    @else

                        <header class="flex justify-between items-center">
                            <h3 class="text-lg select-none hover:text-indigo-500 hover:cursor-pointer">
                                <i class="fa-solid fa-caret-right text-lg mr-2 transition-all"></i>
                                <span class="font-semibold">Meta:</span>
                                {{$item->name}}
                            </h3>

                            <div class="flex flex-col text-sm">
                                <span class="inline-block cursor-pointer text-gray-500 hover:text-gray-700"
                                    wire:click="edit({{ $item }})">
                                    <i class="fa-solid fa-pen mr-1"></i>Editar
                                </span>
                                <span class="inline-block cursor-pointer text-rose-500 hover:text-rose-700"
                                    wire:click="destroy({{ $item }})"
                                    {{-- onclick="deleteGoal({{ $item->id }})" --}}>
                                    <i class="fa-solid fa-trash mr-1"></i>Eliminar
                                </span>
                            </div>
                        </header>

                    @endif

                </div>

            </article>

        @endforeach
    @else

        <div class="flex items-center justify-center p-4">
            <div class="flex flex-col items-center">
                <img class="w-64 h-auto mb-4" src="{{ asset('img/tumbleweed.png') }}" alt="">
                {{-- Source: https://www.creativefabrica.com/product/cactus-tumbleweed-2/ref/154380/ --}}
                <h3 class="text-lg font-bold text-gray-600">Esto está muy tranquilo, demasiado...</h3>
            </div>
        </div>

    @endif

    <div x-data="{open: false}">
        <x-button type="button" color="indigo" x-on:click="open =!open">
            <i class="fa-solid fa-plus mr-1"></i>
            <span>Nueva meta</span>
        </x-button>

        <article class="card my-6 border border-gray-100 shadow-md"
                 x-show="open" x-collapse>
            <div class="px-6 py4 text-gray-700">
                <h3 class="text-xl font-bold">Nueva meta</h3>
                <hr class="mt-2 mb-6">

                <form wire:submit.prevent="store" class="flex">
                    <x-input id="name"
                            name="name"
                            type="text"
                            class="block w-full"
                            placeholder="Escribe un nombre para esta meta"
                            wire:model.live="name" />
                    <x-input-error for="name" class="ml-2" />

                    <x-secondary-button class="hover:bg-rose-600 hover:text-white ml-1"
                            x-on:click="open = false" title="Cancelar">
                        <i class="fa-solid fa-xmark"></i>
                    </x-secondary-button>
                    <x-secondary-button type="submit" class="hover:bg-indigo-500 hover:text-white ml-1"
                            title="Guardar">
                        <i class="fa-solid fa-save"></i>
                    </x-secondary-button>
                </form>
            </div>
        </article>
    </div>
</div>
