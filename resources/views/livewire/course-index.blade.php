<div>
    {{-- Success is as dangerous as failure. --}}
    {{-- @todo Si se seleccionan, mostrar los filtros activos  --}}

    @include('layouts.includes.app.courses.nav')

    <section class="mt-24">

        <div class="container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($courses as $course)
                <x-course-card-2 :course="$course"></x-course-card-2>
            @endforeach

        </div>

        <div class="container mt-8">
            {{ $courses->links(data: ['scrollTo' => false]) }}
        </div>

    </section>

</div>
