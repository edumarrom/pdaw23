<x-app-layout>

    <div class="container mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Columna izquierda --}}
        <div class="lg:col-span-2 order-2 lg:order-1 space-y-12">

            <section>
                <h2 class="text-3xl text-gray-900 font-bold mb-2">
                    {{-- <i class="fa fa-solid fa-payment mr-2"></i> --}}
                    Estás a punto de comprar el curso
                </h2>

                <div class="card">
                    <div class="px-4 py-2">

                        <div class="flex flex-col flex-1 px-4 md:px-2 pt-2 pb-4">
                            <p class="text-lg font-semibold ">
                                {{$course->title}}
                            </p>
                            <p>Por {{ $course->teacher->name }}</p>

                            <div class="cursor-default">
                                <ul class="flex text-xs mb-2">
                                    <li class="text-gray-500 mr-2">
                                        <i class="fa-solid fa-layer-group"></i>
                                        {{$course->category->name}}
                                    </li>

                                    <li class="text-gray-500 mr-2">
                                        <i class="fa-solid fa-cubes"></i>
                                        {{$course->level->name}}
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <span class="text-gray-700 text-lg font-bold">{{ $course->priceEur }}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>

        {{-- Columna derecha --}}
        <div class="order-1 lg:order-2">
            <section class="card shadow-lg space-y-4">
                <div>
                    <div class="mb-4">
                        <h3 class="text-2xl font-semibold mb-4">
                            Resumen de compra
                        </h3>

                        <div class="flex items-center justify-between">
                            <p class="text-xl">Vas a pagar:</p>
                            <p class="text-2xl font-bold">{{ $course->priceEur }}</p>
                        </div>
                    </div>

                    <div>
                        <form action="{{ route('payment.checkout', $course) }}" method="get">
                            @csrf
                            <x-button color="teal" class="w-full justify-center rounded-md !text-sm h-12 mt-4">
                                Continuar
                            </x-button>
                        </form>
                    </div>

                </div>
            </section>
        </div>

    </div>
</x-app-layout>
