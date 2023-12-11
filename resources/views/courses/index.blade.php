<x-app-layout>

    {{-- Hero Section --}}
    <section class="bg-cover" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3)), url({{ asset('img/courses/desktop.jpg ') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="with-full md:w3/4 lg:w-1/2">
                <h1 class="text-4xl text-white font-bold">Encuentra tu próximo curso</h1>
                <p class="text-lg text-white mt-2">
                    Dabaliu te permite ampliar tus oportunidades profesionales y personales, con cursos adaptados a tu
                    nivel y tu ritmo de vida.
                </p>

                {{-- Search bar --}}
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input class=" w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none focus:ring-indigo-500"
                    type="search" name="search" placeholder="Vue para principantes...">
                    <x-button class="absolute rounded-r-lg right-0 top-0 h-10 mt-2">Buscar</x-button>
                </div>

            </div>
        </div>
    </section>

    @livewire('course-index')

</x-app-layout>
