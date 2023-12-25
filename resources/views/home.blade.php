<x-app-layout>

    {{-- Hero Section --}}
    <section class="bg-cover" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3)), url({{ asset('img/home/landing_home.jpg') }})">
        <div class="container py-36">
            <div class="with-full md:w3/4 lg:w-1/2">
                <h1 class="text-4xl text-white font-bold">El placer de aprender con Dabaliu</h1>
                <p class="text-lg text-white mt-2">
                    Dabaliu es tu plataforma de formación en línea donde puedes aprender, ampliar tus conocimientos, e
                    incluso compartirlos con la comunidad.
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

    <section class="mt-24">
        <h2 class="text-gray-600 text-center text-3xl mb-6">Con Dabaliu encontrarás</h2>

        <div class="container py-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="h-48 w-full object-cover" src="{{ asset('img/home/startup.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h3 class="text-center text-xl text-gray-700">Lorem Ipsum</h3>

                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque impedit voluptatum, ullam fugiat illum ea.</p>

                </header>

            </article>
            <article>
                <figure>
                    <img class="h-48 w-full object-cover" src="{{ asset('img/home/student.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h3 class="text-center text-xl text-gray-700">Lorem Ipsum</h3>

                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque impedit voluptatum, ullam fugiat illum ea.</p>

                </header>

            </article>
            <article>
                <figure>
                    <img class="h-48 w-full object-cover" src="{{ asset('img/home/home-office.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h3 class="text-center text-xl text-gray-700">Lorem Ipsum</h3>

                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque impedit voluptatum, ullam fugiat illum ea.</p>

                </header>

            </article>
            <article>
                <figure>
                    <img class="h-48 w-full object-cover" src="{{ asset('img/home/code.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h3 class="text-center text-xl text-gray-700">Lorem Ipsum</h3>

                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque impedit voluptatum, ullam fugiat illum ea.</p>

                </header>

            </article>
        </div>
    </section>

    <section class="mt-24 bg-blue-950 py-12">
        <h2 class="text-center text-white text-3xl">¿Deseando aprender algo nuevo?</h2>
        <p class="text-center text-white">Crea una cuenta y comienza a formarte.</p>

        <div class="flex justify-center mt-4">
            <x-link-button href="{{ route('register') }}" class="bg-teal-500 hover:bg-teal-700 py-4 px-6">
                {{ __('Regístrate') }}
            </x-link-button>
        </div>
    </section>

    <section class="mt-24">

        <h2 class="text-gray-600 text-center text-3xl">Cursos más recientes</h2>
        <p class="text-center text-gray-600 text-sm mb-6">Estos son los últimos cursos publicados</p>


        <div class="container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($courses as $course)

                <x-course-card-2 :course="$course"></x-course-card-2>

            @endforeach

        </div>

    </section>
</x-app-layout>
