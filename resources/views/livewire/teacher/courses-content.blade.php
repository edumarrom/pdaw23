<div>
    <div class="container py-8 grid grid-cols-5">

        @include('teacher.includes.courses.aside')

        <div class="card col-span-4">

            <div class="px6 py4 text-gray-700">
                <h2 class="text-2xl font-bold">Contenido del curso</h2>
                <hr class="mbt-2 mb-6">

                @foreach ($course->sections as $section)

                    <article class="card mb-6 border border-gray-100 shadow-md">
                        <div class="px-6 py4">

                            <header class="flex justify-between items-center">
                                <h3 class="cursor-pointer">
                                    {{$section->title}}
                                </h3>

                                <div class="flex flex-col text-sm">
                                    <span class="inline-block cursor-pointer text-gray-500 hover:text-gray-700">
                                        <i class="fa-solid fa-pen mr-1"></i>Editar
                                    </span>
                                    <span class="inline-block cursor-pointer text-rose-500 hover:text-rose-700">
                                        <i class="fa-solid fa-trash mr-1"></i>Eliminar
                                    </span>
                                </div>
                            </header>

                        </div>
                    </article>

                @endforeach

            </div>

        </div>

    </div>
</div>
