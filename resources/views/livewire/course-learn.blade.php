<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Columna izquierda--}}
        <div class="lg:col-span-2 mb-6">

            <div class="embed-responsive rounded mb-4 shadow-lg">
                {!! $lesson->iframe !!}
            </div>

            <h1 class="text-2xl text-gray-700 font-bold">
                <span>{{$index+1}}. </span>{{ $lesson->title }}
            </h1>

            @if ($lesson->description)
                <div class="text-gray-700">
                    {{ $lesson->description->description }}
                </div>
            @endif

            <label class="relative inline-flex items-center mt-2 mb-5 cursor-pointer">
                <input type="checkbox"
                    class="sr-only peer"
                    wire:click="toggleCompleted"
                    @if ($this->lesson->completed) checked @endif>
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                <span class="ms-3 text-base font-medium text-gray-700 dark:text-gray-300">Marcar lección como completa</span>
            </label>

            <div class="flex justify-between card shadow-lg rounded-lg">
                @if ($previous)
                <x-link-button href="{{route('courses.learn', [$course, $previous])}}">
                    Anterior
                </x-link-button>
                @else
                <x-link-button disabled>
                    Anterior
                </x-link-button>
                @endif

                @if ($next)
                <x-link-button href="{{route('courses.learn', [$course, $next])}}">
                    Siguiente
                </x-link-button>
                @else
                <x-link-button disabled>
                    Siguiente
                </x-link-button>
                @endif
            </div>

            {{-- Comentarios --}}
            @livewire('lessons-comments', ['lesson' => $lesson], key($lesson->id))

        </div>

        {{-- Columna derecha--}}
        <div class="card">
            <p class="text-xl font-bold text-center">{{ $course->title }}</p>

            <div class="flex items-center mt-2">
                <figure>
                    <img class="h-16 w-16 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                </figure>
                <div class="ml-2">
                    <p>Realizado por</p>
                    <h3 class="text-xl font-bold">
                        {{ $course->teacher->name }}
                    </h3>
                    <a class="text-sm text-teal-500 hover:text-teal-700"
                            href="">
                        {{'@' . Str::slug($course->teacher->name, '')}}
                    </a>
                </div>
            </div>

            <div class="mt-2 text-sm text-gray-600">{{$this->advance}}% completado</div>
            <div class="w-full bg-gray-200 rounded-full h-1.5 mb-4 ">
                <div class="bg-indigo-400 h-1.5 rounded-full transition-width ease-in-out duration-500" style="width: {{$this->advance}}%"></div>
            </div>

            <ul class="mt-4">
                @foreach ($course->sections as $section)
                    <li class="text-gray-700 mb-4"
                        x-data="{open: false}">
                        <div class="mb-2 cursor-pointer" x-on:click="open = !open">
                            <i class="fa fa-solid fa-caret-right text-base mr-2 transition-all"
                                x-bind:class="!open || 'rotate-90'"></i>
                            <span class="text-sm font-bold">
                                {{ Str::limit($section->title, 40) }}
                            </span>
                        </div>
                        <ul x-show="open" x-collapse>
                            @foreach ($section->lessons as $key => $lesson)
                                <li class="flex"
                                    @if ($lesson->id == $this->lesson->id)
                                        x-init="open = 'true'"
                                    @endif>
                                    <div>
                                        <a href="{{ route('courses.learn', [$course, $lesson]) }}">

                                        @if ($lesson->completed)
                                            @if ($lesson->id == $this->lesson->id)
                                                <span class="inline-block w-5 h-5 rounded-full border-4 border-indigo-400 mt-1 mr-2"></span>
                                            @else
                                                <span class="inline-block w-5 h-5 rounded-full bg-indigo-400 mt-1 mr-2"></span>
                                            @endif
                                        @else

                                            @if ($lesson->id == $this->lesson->id)
                                                <span class="inline-block w-5 h-5 rounded-full border-4 border-gray-500 mt-1 mr-2"></span>
                                            @else
                                                <span class="inline-block w-5 h-5 rounded-full bg-gray-500 mt-1 mr-2"></span>
                                            @endif

                                        @endif

                                    </div>
                                    {{-- <i class="fa-solid fa-play-circle mr-2"></i> --}}

                                        {{-- <span class="font-bold text-rose-400">[{{ $lesson->id }}]</span> --}}
                                        {{ $key+1 }}. {{ Str::limit($lesson->title, 40) }}
                                    </a>
                                </li>

                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>

        </div>

    </div>
</div>
