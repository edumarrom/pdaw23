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
                            <h3 class="text-lg select-none">
                                <i class="fa-solid fa-check text-lg mr-2 transition-all"></i>
                                <span class="font-semibold">Meta:</span>
                                {{$item->name}}
                            </h3>

                            <div class="flex flex-col text-sm">
                                <span class="inline-block cursor-pointer text-gray-500 hover:text-gray-700"
                                    wire:click="edit({{ $item }})">
                                    <i class="fa-solid fa-pen mr-1"></i>Editar
                                </span>
                                <span class="inline-block cursor-pointer text-rose-500 hover:text-rose-700"
                                    {{-- wire:click="destroy({{ $item }})" --}}
                                    onclick="destroyGoal({{ $item }})">
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
                <i class="fa-solid fa-graduation-cap text-8xl text-gray-200 mb-6"></i>
                <h3 class="text-lg font-bold text-gray-500">No hay metas definidas para este curso</h3>
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

    @push('scripts')
        <script>
            window.addEventListener('swal', event => {
                const detail = event.detail[0];
                Swal.fire({
                    icon: detail.icon,
                    title: detail.title,
                    text: detail.text,
                    confirmButtonColor: detail.confirmButtonColor,
                })
            })
        </script>

        <script>
            function destroyGoal(goal) {
                Swal.fire({
                    icon: 'warning',
                    title: '¿Estás seguro?',
                    text: "Esta acción es irreversible",
                    showCancelButton: true,
                    confirmButtonText: 'Confirmar',
                    confirmButtonColor: '#EF4444',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('destroy', goal);
                    }
                })
            }
        </script>
    @endpush

</div>
