<div>
    <div class="container py-8 grid grid-cols-5">

        @include('teacher.includes.courses.aside')

        <div class="card col-span-4">

            <div class="px6 py4 text-gray-700">
                <h2 class="text-2xl font-bold">Contenido del curso</h2>
                <hr class="mt-2 mb-6">

                @foreach ($course->sections->sortBy('created_at') as $item)

                    <article class="card mb-6 border border-gray-100 shadow-md">
                        <div class="px-6 py4">

                            @if ($section->id == $item->id)
                                <form wire:submit.prevent='updateSection' class="flex">
                                    <x-input id="title"
                                             name="title"
                                             type="text"
                                             class="block w-full"
                                             placeholder="Escribe un título para esta sección"
                                             wire:model.live="section.title" />
                                    <x-input-error for="section.title" class="mt-2" />
                                    <x-secondary-button class="ml-2" wire:click="updateSection">
                                        <i class="fa-solid fa-check" title="Guardar"></i>
                                    </x-secondary-button>
                                </form>
                            @else
                                <header class="flex justify-between items-center">
                                    <h3 class=" text-lg font-semibold cursor-pointer">
                                        <i class="fa-solid fa-bookmark mr-1"></i>
                                        {{$item->title}}
                                    </h3>

                                    <div class="flex flex-col text-sm">
                                        <span class="inline-block cursor-pointer text-gray-500 hover:text-gray-700"
                                            wire:click="editSection({{$item}})">
                                            <i class="fa-solid fa-pen mr-1"></i>Editar
                                        </span>
                                        <span class="inline-block cursor-pointer text-rose-500 hover:text-rose-700"
                                              {{-- wire:click="destroySection({{$item}})" --}}
                                              onclick="deleteSection({{ $item->id }})">
                                            <i class="fa-solid fa-trash mr-1"></i>Eliminar
                                        </span>
                                    </div>
                                </header>

                                <div>
                                    @livewire('teacher.courses-lesson', ['section' => $item], key($item->id))
                                </div>
                            @endif

                        </div>
                    </article>

                @endforeach

                <div x-data="{open: false}">
                    <x-button type="button" color="indigo" x-on:click="open =!open">
                        <i class="fa-solid fa-plus mr-1"></i>
                        <span>Nueva sección</span>
                    </x-button>

                    <article class="card my-6 border border-gray-100 shadow-md"
                             x-show="open" x-collapse>
                        <div class="px-6 py4 text-gray-700">
                            <h3 class="text-xl font-bold">Nueva sección</h3>
                            <hr class="mt-2 mb-6">

                            <form wire:submit.prevent='storeSection'>
                                <div class="mb-4">
                                    <x-input id="title"
                                            name="title"
                                            type="text"
                                            class="block w-full"
                                            placeholder="Escribe un título para esta sección"
                                            wire:model.live="title" />
                                    <x-input-error for="title" class="mt-2" />
                                </div>

                                <div class="flex justify-between">
                                    <x-button x-on:click="open = false">
                                        <i class="fa-solid fa-xmark mr-2"></i>
                                        Cancelar
                                    </x-button>

                                    <x-button color="indigo">
                                        <i class="fa-solid fa-save mr-2"></i>
                                        Guardar
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    </article>
                </div>

            </div>

        </div>

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
            function deleteSection(sectionId) {
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
                        @this.call('destroySection', sectionId);
                    }
                })
            }
        </script>

    @endpush

</div>
