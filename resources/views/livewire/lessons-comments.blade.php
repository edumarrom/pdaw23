<section>

    <div class="text-2xl text-gray-700 font-bold mt-10 mb-2">
        Comentarios
    </div>

    <div class="card">
        <div class="px-4 py-2">

            <form wire:submit.prevent='store'>

                <div class="flex">
                    <figure class="flex-shrink-0">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{ auth()->user()->profile_photo_url }}" alt="">
                    </figure>

                    <div class="w-full ml-4 mb-2">
                        <x-textarea id="body"
                                    name="body"
                                    class="w-full"
                                    rows="2"
                                    placeholder="Añade un comentario..."
                                    wire:model.live="create_body"></x-textarea>
                        <x-input-error for="create_body" class="mt-2" />
                    </div>
                </div>
                <div class="flex justify-end">
                    <x-button color="indigo" class="ml-2">
                        Comentar
                    </x-button>
                </div>

            </form>

        </div>

        @foreach ($comments as $item)
            <hr class="my-4">
            @if ($comment->id == $item->id)
                <div class="px-4 py-2">

                    <form wire:submit.prevent='update'>

                        <div class="flex">
                            <figure class="flex-shrink-0">
                                <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{ auth()->user()->profile_photo_url }}" alt="">
                            </figure>

                            <div class="w-full ml-4 mb-2">
                                <x-textarea id="body"
                                            name="body"
                                            class="w-full"
                                            rows="2"
                                            placeholder="Añade un comentario..."
                                            wire:model.live="comment.body"></x-textarea>
                                <x-input-error for="comment.body" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <x-secondary-button wire:click="cancel">
                                Cancelar
                            </x-secondary-button>

                            <x-button color="indigo" class="ml-2">
                                Comentar
                            </x-button>
                        </div>

                    </form>

                </div>
            @else
                <div class="flex mb-8">
                    <figure class="flex-shrink-0">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $item->user->profile_photo_url }}" alt="">
                    </figure>
                    <div class="flex w-full">
                        <article class="w-full">
                            <div class="ml-4">
                                <p class="text-gray-700 font-bold">{{ $item->user->name }}</p>
                                <p class="mb-2 text-xs text-gray-600">{{ $item->created_at ? $item->created_at->diffForHumans() : '' }}</p>
                                <p class="text-sm text-gray-600">{{ $item->body }}</p>
                            </div>
                        </article>
                        @can('author', $item)
                            <x-dropdown align="right">
                                <x-slot name="trigger">
                                    <button class="w-8">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link class="cursor-pointer" wire:click="edit({{ $item }})">
                                        <i class="fa-solid fa-pen mr-1"></i>
                                        Editar
                                    </x-dropdown-link>
                                    <x-dropdown-link class="cursor-pointer" wire:click="">
                                        <i class="fa-solid fa-trash mr-1"></i>
                                        Eliminar
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        @endcan
                    </div>
                </div>
            @endif
        @endforeach

    </div>

</section>
