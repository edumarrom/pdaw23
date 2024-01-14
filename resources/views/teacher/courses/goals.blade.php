<x-app-layout>

    <div class="container py-8 grid grid-cols-5">

        @include('teacher.includes.courses.aside')

        <div class="col-span-4">

            <div class="card  mb-8">
                @livewire('teacher.courses-goals', ['course' => $course], key('courses-goals-' . $course->id))
            </div>

            <div class="card  mb-8">
                @livewire('teacher.courses-requirements', ['course' => $course], key('courses-requirements-' . $course->id))
            </div>

        </div>

    </div>

</x-app-layout>
