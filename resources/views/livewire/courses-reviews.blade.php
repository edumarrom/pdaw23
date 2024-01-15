<div>
    <section>
        <h3 class="text-3xl font-bold mt-6 mb-2">
            <i class="fa fa-solid fa-comment-dots mr-2"></i>
            Opiniones
        </h3>
        <div class="card p-0 divide-y-2">
            @foreach ($course->reviews as $review)

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
            @endforeach
        </div>
    </section>
</div>
