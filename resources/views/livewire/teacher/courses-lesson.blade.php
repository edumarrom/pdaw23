<div>

    @foreach ($section->lessons->sortBy('created_at') as $item)

        <article class="card border border-gray-100 shadow-md mt-4">

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
                                    wire:model.live="lesson.title" />
                            <x-input-error for="lesson.title" class="mt-2" />
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
                            <x-input-error for="platform_id" class="mt-2" />
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

                        <x-secondary-button type="button" class="hover:text-white hover:bg-rose-600">
                            <i class="fa-solid fa-trash mr-1"></i>
                            Eliminar
                        </x-secondary-button>
                    </div>
                @endif

            </div>

        </article>

    @endforeach
</div>
