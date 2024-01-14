<x-app-layout>

    <div class="container py-8 grid grid-cols-5">

        @include('teacher.includes.courses.aside')

        <div class="card col-span-4">

            <div>
                @livewire('teacher.courses-goals', ['course' => $course], key($course->id))
            </div>

        </div>

    </div>

</x-app-layout>
