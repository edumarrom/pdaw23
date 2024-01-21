<div>
    <section>
        <h3 class="text-3xl font-bold mt-6 mb-2">
            <i class="fa fa-solid fa-comment-dots mr-2"></i>
            Opiniones
        </h3>

        @if ($course->reviews_count > 0)
            <div class="mb-2">

                <div class="px-4 py-2">
                    <div>
                        <div class="flex items-center mb-2">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($course->rating >= $i)
                                    <i class="fa fa-solid fa-star text-amber-400"></i>
                                @else
                                    <i class="fa fa-solid fa-star text-gray-400"></i>
                                @endif
                            @endfor
                            <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ $course->rating }}</p>
                            <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400"> de </p>
                            <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">5</p>
                            <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                ({{ $course->reviews_count }} {{ $course->reviews_count == 1 ? 'valoración' : 'valoraciones' }})
                            </p>
                        </div>

                        <div>
                            @for ($i = 1; $i <= 5; $i++)
                                @php
                                    $ratingCount = $reviews->where('rating', '=', $i)->count();
                                    $ratingCountPercent = $ratingCount * 100 / ($reviews->count()? : 1);
                                @endphp
                                <div class="flex items-center mt-1">
                                    <span class="text-sm font-medium text-indigo-600">{{ $i }}</span>
                                    <div class="w-full h-2 mx-4 bg-gray-200 rounded">
                                        <div class="h-2 bg-amber-400 rounded" style="width: {{ $ratingCountPercent }}%"></div>
                                    </div>
                                    <div class="w-0">
                                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ round($ratingCountPercent) }}%</span>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

            </div>
        @endif

        @can('enrolled', $course)

            @if($reviews->contains('user_id', auth()->id()))
                <div class="card mb-4">

                    <div  class="px-4 py-1  ">
                        ¡Gracias por compartir tu opinión con nosotros!
                    </div>
                </div>
            @else
                <div class="card mb-4">

                    <div  class="px-4 py-2  ">

                        <form wire:submit.prevent='store'>
                            <div class="mb-2">
                                <span class="text-xl font-semibold mr-2">Valora este curso:</span>

                                {{-- Hacer un checkbox que su label sea un icono de estrella de fontawesome  --}}
                                <div class="inline-block">
                                    <ul class="flex text-xl">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', {{ $i }})">
                                                @if ($rating >= $i)
                                                    <i class="fa fa-solid fa-star text-amber-400"></i>
                                                @else
                                                    <i class="fa fa-solid fa-star text-gray-400"></i>
                                                @endif
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>

                            <div class="mb-2">
                                <x-textarea id="comment"
                                            name="comment"
                                            class="block w-full mb-2"
                                            rows="3"
                                            placeholder="Cuéntanos qué te ha parecido este curso"
                                            wire:model.live="comment"></x-textarea>
                                <x-input-error for="comment" class="mt-2" />
                            </div>

                            <div class="flex justify-end">
                                <x-secondary-button type="submit" class="hover:bg-indigo-500 hover:text-white ml-2"
                                        title="Enviar">
                                    <i class="fa-solid fa-check mr-1"></i>
                                    Enviar
                                </x-secondary-button>
                            </div>
                        </form>

                    </div>

                </div>
            @endif
        @endcan

        <div class="card p-0 divide-y-2">
            @forelse ($reviews as $review)
                <article class="flex p-4">
                    <figure class="mr-4">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$review->user->profile_photo_url}}" alt="">
                    </figure>
                    <div class="flex-1">
                        <div>
                            <h2 class="text-xl font-bold">{{$review->user->name}}</h2>
                            <ul class="flex text-sm">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($review->rating >= $i)
                                        <li class="mr-1"><i class="fa fa-solid fa-star text-amber-400"></i></li>
                                    @else
                                        <li class="mr-1"><i class="fa fa-solid fa-star text-gray-400"></i></li>
                                    @endif
                                @endfor
                            </ul>
                            {{$review->comment}}
                        </div>
                    </div>
                </article>
            @empty
                <div class="flex items-center justify-center p-4">
                    <div class="flex flex-col items-center">
                        <i class="fa-solid fa-star text-8xl text-gray-200 mb-6"></i>
                        <h3 class="text-lg font-bold text-gray-500">Este curso aún no ha recibido opiniones</h3>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $reviews->links(data: ['scrollTo' => false]) }}
        </div>
    </section>
</div>
