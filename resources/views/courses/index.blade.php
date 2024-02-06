@section('title', 'Cursos gratis, de Básico a Experto ➡ Desarrollo, Diseño y más | Dabaliu')
<x-app-layout>

    {{-- Hero Section --}}
    <section class="bg-cover" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3)), url({{ asset('img/courses/desktop.jpg ') }})">
        <div class="container py-36">
            <div class="with-full md:w3/4 lg:w-1/2">
                <h1 class="text-4xl text-white font-bold">Encuentra tu próximo curso</h1>
                <p class="text-lg text-white mt-2">
                    Dabaliu te permite ampliar tus oportunidades profesionales y personales, con cursos adaptados a tu
                    nivel y tu ritmo de vida.
                </p>

                {{-- Search bar --}}
                @livewire('search')

            </div>
        </div>
    </section>

    @livewire('courses-index')

</x-app-layout>
