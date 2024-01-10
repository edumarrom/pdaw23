<div>
    <div class="container py-8 grid grid-cols-5">

        @include('teacher.includes.courses.aside')

        <div class="card col-span-4">

            <div class="px6 py4 text-gray-700">
                <h2 class="text-2xl font-bold">Contenido del curso</h2>
                <hr class="mbt-2 mb-6">

                @foreach ($course->sections as $item)

                    <article class="card mb-6 border border-gray-100 shadow-md">
                        <div class="px-6 py4">

                            @if ($section->id == $item->id)
                                <form wire:submit.prevent='updateSection' class="flex">
                                    <x-input id="title"
                                             name="title"
                                             type="text"
                                             class="block w-full"
                                             placeholder="Escribe un nombre para este usuario"
                                             wire:model.live="section.title" />
                                    <x-input-error for="section.title" class="mt-2" />
                                    <x-secondary-button class="ml-2" wire:click="updateSection">
                                        <i class="fa-solid fa-check" title="Guardar"></i>
                                    </x-secondary-button>
                                </form>
                            @else
                                <header class="flex justify-between items-center">
                                    <h3 class="cursor-pointer">
                                        {{$item->title}}
                                    </h3>

                                    <div class="flex flex-col text-sm">
                                        <span class="inline-block cursor-pointer text-gray-500 hover:text-gray-700"
                                            wire:click="editSection({{$item}})">
                                            <i class="fa-solid fa-pen mr-1"></i>Editar
                                        </span>
                                        <span class="inline-block cursor-pointer text-rose-500 hover:text-rose-700">
                                            <i class="fa-solid fa-trash mr-1"></i>Eliminar
                                        </span>
                                    </div>
                                </header>
                            @endif

                        </div>
                    </article>

                @endforeach

            </div>

        </div>

    </div>
</div>
