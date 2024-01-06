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
                        <x-label for="title" class="mb-2"  value="Título" />
                        <x-input id="title"
                                 name="title"
                                 type="text"
                                 required
                                 class="block w-full mb-2"
                                 placeholder="Escribe un título para este curso"
                                 value="{{ old('title', $course->title) }}" />
                    </div>

                    <div class="mb-4">
                        <x-label for="slug" class="mb-2"  value="Slug" />
                        <x-input id="slug"
                                 name="slug"
                                 type="text"
                                 required
                                 class="block w-full mb-2"
                                 placeholder="Escribe un slug para este curso"
                                 value="{{ old('slug', $course->slug) }}" />
                    </div>

                    <div class="mb-4">
                        <x-label for="subtitle" class="mb-2"  value="Subtítulo" />
                        <x-input id="subtitle"
                                 name="subtitle"
                                 type="text"
                                 required
                                 class="block w-full mb-2"
                                 placeholder="Escribe un subtítulo para este curso"
                                 value="{{ old('subtitle', $course->subtitle) }}" />
                    </div>

                    <div class="mb-4">
                        <x-label for="description" class="mb-2"  value="Descripción" />
                        <x-textarea id="description"
                                    name="description"
                                    required
                                    class="block w-full mb-2"
                                    rows="4"
                                    placeholder="Escribe una descripción para este curso"
                                    value="{{ old('description', $course->description) }}" />
                    </div>

                    <div class="mb-4">
                        <x-label for="category_id" class="mb-2"  value="Categoría" />
                        <x-select id="category_id"
                                name="category_id"
                                class="block w-full mb-2">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if($category->id == old('category_id', $course->category_id)) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </x-select>
                    </div>

                </form>
            </div>

        </div>

    </div>
</x-app-layout>
