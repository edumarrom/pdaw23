<div>

    @foreach ($section->lessons->sortBy('created_at') as $item)

        <article class="card border border-gray-100 shadow-md mt-4 mb-6">

            <div class="px-4 py-2">

                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent='updateLesson'>
                        <div class="mb-2">
                            <x-label for="title" class="mb-1" value="Título" />
                            <x-input id="title"
                                    name="title"
                                    type="text"
                                    class="block w-full"
                                    placeholder="Escribe un título para esta lección"
                                    wire:model.live.debounce.1000ms="lesson.title" />
                            <x-input-error for="lesson.title" class="mt-2" />
                        </div>

                        <div class="mb-2">
                            <x-label for="slug" class="mb-1" value="Slug" />
                            <x-input id="slug"
                                    name="slug"
                                    type="text"
                                    class="block w-full"
                                    placeholder="Escribe un slug para esta lección"
                                    wire:model="lesson.slug" />
                            <x-input-error for="lesson.slug" class="mt-2" />
                        </div>

                        <div class="mb-2">
                            <x-label for="platform_id" class="mb-1" value="Plataforma" />
                            <x-select id="platform_id"
                                      name="platform_id"
                                      class="block w-full mb-2"
                                      wire:model.live="lesson.platform_id">
                                @foreach($platforms as $platform)
                                    <option value="{{ $platform->id }}">
                                        {{ $platform->name }}
                                    </option>
                                @endforeach
                            </x-select>
                            <x-input-error for="lesson.platform_id" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-label for="path" class="mb-1" value="Enlace" />
                            <x-input id="path"
                                    name="path"
                                    type="text"
                                    class="block w-full"
                                    placeholder="Escribe un enlace de vídeo para esta lección"
                                    wire:model.live="lesson.path" />
                            <x-input-error for="lesson.path" class="mt-2" />
                        </div>

                        <div class="flex justify-end">
                            <x-secondary-button type="button" class="hover:bg-rose-600 hover:text-white"
                                    wire:click="cancelEdit" title="Cancelar">
                                <i class="fa-solid fa-xmark"></i>
                            </x-secondary-button>
                            <x-secondary-button type="submit" class="hover:bg-indigo-500 hover:text-white ml-2"
                                    title="Guardar">
                                <i class="fa-solid fa-check"></i>
                            </x-secondary-button>
                        </div>
                    </form>
                @else
                    <header>
                        <h4>
                            <i class="fa fa-solid fa-play-circle mr-1"></i>
                            {{ $item->title }}
                        </h4>
                    </header>

                    <div>

                        <hr class="my-2">

                        <p class="text-sm">
                            Plataforma:
                            @switch( Str::lower($item->platform->name) )
                                @case('youtube')
                                    <span class="text-red-500">
                                        <i class="fa-brands fa-youtube"></i>
                                        <span class="font-medium">{{ $item->platform->name }}</span>
                                    </span>
                                    @break
                                @case('vimeo')
                                    <span class="text-blue-400">
                                        <i class="fa-brands fa-vimeo"></i>
                                        <span class="font-medium">{{ $item->platform->name }}</span>
                                    @break
                                @default
                                        <span class="font-medium">{{ $item->platform->name }}</span>
                                    </span>
                            @endswitch
                        </p>
                        <p class="text-sm">
                            Enlace:
                            <a href="{{ $item->path }}" target="_blank"
                                class="text-indigo-500">
                                {{ $item->path }}
                            </a>
                        </p>
                    </div>

                    <div class="flex justify-end">
                        <x-secondary-button type="button" class="hover:text-white hover:bg-indigo-500 mr-2"
                                wire:click="editLesson({{ $item->id }})">
                            <i class="fa-solid fa-pen mr-1"></i>
                            Editar
                        </x-secondary-button>

                        <x-secondary-button type="button" class="hover:text-white hover:bg-rose-600"
                                wire:click="destroyLesson({{ $item->id }})"
                                {{-- @todo: Lograr que tras la confirmación se refersque la vista --}}
                                {{-- onclick="deleteLesson({{ $item->id }})" --}}>
                            <i class="fa-solid fa-trash mr-1"></i>
                            Eliminar
                        </x-secondary-button>
                    </div>
                @endif

            </div>

        </article>

    @endforeach

    <div x-data="{open: false}">
        <x-button type="button" color="indigo" x-on:click="open =!open">
            <i class="fa-solid fa-plus mr-1"></i>
            <span>Nueva lección</span>
        </x-button>

        <article class="card my-6 border border-gray-100 shadow-md"
                 x-show="open" x-collapse>
            <div class="px-6 py4 text-gray-700">
                <h3 class="text-xl font-bold">Nueva lección</h3>
                <hr class="mt-2 mb-6">

                <form wire:submit.prevent='storeLesson'>
                    <div class="mb-2">
                        <x-label for="title" class="mb-1" value="Título" />
                        <x-input id="title"
                                name="title"
                                type="text"
                                class="block w-full"
                                placeholder="Escribe un título para esta lección"
                                wire:model.live.debounce.1000ms="title" />
                        <x-input-error for="title" class="mt-2" />
                    </div>

                    <div class="mb-2">
                        <x-label for="slug" class="mb-1" value="Slug" />
                        <x-input id="slug"
                                name="slug"
                                type="text"
                                class="block w-full"
                                placeholder="Escribe un slug para esta lección"
                                wire:model="slug" />
                        <x-input-error for="slug" class="mt-2" />
                    </div>

                    <div class="mb-2">
                        <x-label for="platform_id" class="mb-1" value="Plataforma" />
                        <x-select id="platform_id"
                                  name="platform_id"
                                  class="block w-full mb-2"
                                  wire:model.live="platform_id">
                            @foreach($platforms as $platform)
                                <option value="{{ $platform->id }}">
                                    {{ $platform->name }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input-error for="platform_id" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-label for="path" class="mb-1" value="Enlace" />
                        <x-input id="path"
                                name="path"
                                type="text"
                                class="block w-full"
                                placeholder="Escribe un enlace de vídeo para esta lección"
                                wire:model.live="path" />
                        <x-input-error for="path" class="mt-2" />
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
            function deleteLesson(lessonId) {
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
                        @this.call('destroyLesson', lessonId);
                    }
                })
            }
        </script>

    @endpush

</div>
