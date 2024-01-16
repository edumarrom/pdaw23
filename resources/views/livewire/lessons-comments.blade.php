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
                        <x-textarea id="comment"
                                    name="comment"
                                    class="w-full"
                                    rows="2"
                                    placeholder="Añade un comentario..."
                                    wire:model.live="comment"></x-textarea>
                        <x-input-error for="comment" class="mt-2" />
                    </div>
                </div>
                <div class="flex justify-end">
                    <x-secondary-button x-on:click="open = false">
                        Cancelar
                    </x-secondary-button>

                    <x-button color="indigo" class="ml-2" {{-- :disabled="empty($comment)" --}}>
                        Comentar
                    </x-button>
                </div>

            </form>

        </div>

        @foreach ($lesson->comments as $comment)
            <hr class="my-4">
            <article class="flex mb-8">
                <figure class="flex-shrink-0">
                    <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $comment->user->profile_photo_url }}" alt="">
                </figure>
                <div class="ml-4">
                    <p class="text-gray-700 font-bold">{{ $comment->user->name }}</p>
                    <p class="mb-2 text-xs text-gray-600">{{ $comment->created_at ? $comment->created_at->diffForHumans() : '' }}</p>
                    <p class="text-sm text-gray-600">{{ $comment->body }}</p>
                </div>
            </article>
        @endforeach

    </div>

</section>
