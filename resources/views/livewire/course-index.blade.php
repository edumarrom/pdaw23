<div>
    {{-- Success is as dangerous as failure. --}}
    {{-- Miau --}}

    <section class="mt-24">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($courses as $course)

                <x-course-card-2 :course="$course"></x-course-card-2>

            @endforeach

        </div>

        <div class="max-w-7xl mx-auto mt-8 px-4 sm:px-6 lg:px-8">
            {{ $courses->links() }}
        </div>

    </section>

</div>
