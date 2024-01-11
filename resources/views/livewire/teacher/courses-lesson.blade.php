<div>

    @foreach ($section->lessons as $item)

        <article class="card border border-gray-100 shadow-md mt-4">

            <div class="px-4 py-2">

                @if ($lesson->id == $item->id)
                    editar la lección
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
