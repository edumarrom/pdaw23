<x-app-layout>
    <div class="container py-8">

        <div class="card">

            <div class="px6 py4 text-gray-700">
                <h2 class="text-2xl font-bold">Información del curso</h2>
                <hr class="mbt-2 mb-6">

                <form action="{{ route('teacher.courses.update', $course) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-6 relative">
                        <figure>
                            <img id="course-image" class="w-full aspect-[5/1] object-cover object-center rounded-md"
                                 src="{{ Storage::url($course->image->path) }}" alt="">
                        </figure>

                        <div class="absolute bottom-4 left-4">
                            <x-label for="image" value="Seleccionar imagen"
                                     class="bg-white px-2 py-1 border border-gray-300 text-sm shadow-sm rounded cursor-pointer" />
                            <x-input id="image"
                                     name="image"
                                     type="file"
                                     class="hidden"
                                     accept="image/*"
                                     {{-- onchange="previewImage(event)" --}} />
                        </div>

                    </div>

                    <div class="mb-4">
                        <x-label for="title" class="mb-2"  value="Título" />
                        <x-input id="title"
                                 name="title"
                                 type="text"
                                 required
                                 class="block w-full mb-2"
                                 placeholder="Escribe un título para este curso"
                                 value="{{ old('title', $course->title) }}" />
                        <x-input-error for="title" class="mt-2" />
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
                        <x-input-error for="slug" class="mt-2" />
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
                        <x-input-error for="subtitle" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-label for="description" class="mb-2"  value="Descripción" />
                        <x-textarea id="description"
                                    name="description"
                                    required
                                    class="block w-full mb-2"
                                    rows="4"
                                    placeholder="Escribe una descripción para este curso">
                            {{ old('description', $course->description) }}
                        </x-textarea>
                        <x-input-error for="description" class="mt-2" />
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
                        <x-input-error for="category_id" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-label for="level_id" class="mb-2"  value="Nivel" />
                        <x-select id="level_id"
                                  name="level_id"
                                  class="block w-full mb-2">
                            @foreach($levels as $level)
                                <option value="{{ $level->id }}"
                                        @if($level->id == old('level_id', $course->level_id)) selected @endif>
                                    {{ $level->name }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-label for="price_id" class="mb-2"  value="Precio" />
                        <x-select id="price_id"
                                  name="price_id"
                                  class="block w-full mb-2">
                            @foreach($prices as $price)
                                <option value="{{ $price->id }}"
                                        @if($price->id == old('price_id', $course->price_id)) selected @endif>
                                    {{ $price->name }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div class="flex justify-between mt-16">
                        <x-link-button href="{{ route('teacher.courses.index') }}">
                            <i class="fa-solid fa-xmark mr-2"></i>
                            Cancelar
                        </x-link-button>

                        <x-button color="indigo">
                            <i class="fa-solid fa-save mr-2"></i>
                            Guardar
                        </x-button>
                    </div>

                </form>
            </div>

        </div>

    </div>

    @push('scripts')

        <script>

            // function previewImage(e) {

            document.querySelector('#image').addEventListener('change', function (e) {
                let file = e.target.files[0];
                let reader = new FileReader();

                reader.onload = (e) => {
                    document.querySelector('#course-image').setAttribute('src', e.target.result);
                    URL.revokeObjectURL(e.target.result);
                };

                reader.readAsDataURL(file);
            });
        </script>
    @endpush
</x-app-layout>
