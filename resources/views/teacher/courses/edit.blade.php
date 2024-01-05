<x-app-layout>
    <div class="container py-8">

        <div class="card">

            <div class="px6 py4 text-gray-700">
                <h2 class="text-2xl font-bold">Información del curso</h2>
                <hr class="mbt-2 mb-6">

                <form action="{{ route('teacher.courses.update', $course) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <x-label for="title" class="mb-2"  value="Título del curso" />
                        <x-input id="title"
                                 name="title"
                                 type="text"
                                 required
                                 class="block w-full mb-2"
                                 placeholder="Escribe un título para este curso"
                                 value="{{ old('title', $course->title) }}" />
                    </div>

                    <div class="mb-4">
                        <x-label for="slug" class="mb-2"  value="Slug del curso" />
                        <x-input id="slug"
                                 name="slug"
                                 type="text"
                                 required
                                 class="block w-full mb-2"
                                 placeholder="Escribe un slug para este curso"
                                 value="{{ old('slug', $course->slug) }}" />
                    </div>

                </form>
            </div>

        </div>

    </div>
</x-app-layout>
