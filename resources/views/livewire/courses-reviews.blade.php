<div>
    <section>
        <h3 class="text-3xl font-bold mt-6 mb-2">
            <i class="fa fa-solid fa-comment-dots mr-2"></i>
            Opiniones
        </h3>

        <div class="">

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
                        <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">({{ $course->reviews->count() }} valoraciones)</p>
                    </div>

                    @php
                        $ratingCounts = [
                            ['rate' => '1', 'value' => $course->reviews->where('rating', '=', 1)->count()],
                            ['rate' => '2', 'value' => $course->reviews->where('rating', '=', 2)->count()],
                            ['rate' => '3', 'value' => $course->reviews->where('rating', '=', 3)->count()],
                            ['rate' => '4', 'value' => $course->reviews->where('rating', '=', 4)->count()],
                            ['rate' => '5', 'value' => $course->reviews->where('rating', '=', 5)->count()],
                        ]
                    @endphp

                    @foreach ($ratingCounts as $ratingCount)
                        @php
                            $ratingCountPercent = $ratingCount['value'] * 100 / $course->reviews->count();
                        @endphp
                        <div class="flex items-center mt-1">
                            <span class="text-sm font-medium text-indigo-600">{{ $ratingCount['rate'] }}</span>
                            <div class="w-full h-2 mx-4 bg-gray-200 rounded">
                                <div class="h-2 bg-amber-400 rounded" style="width: {{ $ratingCountPercent }}%"></div>
                            </div>
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $ratingCountPercent }}%</span>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

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
