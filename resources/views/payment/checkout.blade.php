<x-app-layout>

    <div class="container mt-8">

        <div class="px-4-py-2">
            <h2 class="text-3xl text-gray-900 font-bold mb-2">
                {{-- <i class="fa fa-solid fa-payment mr-2"></i> --}}
                Estás a punto de comprar el curso:
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Columna izquierda --}}
        <div class="lg:col-span-2 space-y-12">

            <section>

                <div class="card">
                    <div class="px-4 py-2">

                        <div class="flex flex-col md:flex-row">
                            {{-- <img src="{{ $course->imagePath }}" alt="" class="h-40 w-40 object-cover rounded-md"> --}}
                            <img class="w-auto h-36 aspect-[16/9] rounded object-cover object-center" src="{{ $course->imagePath }}" alt="">

                            <div class="flex flex-col flex-1 mx-2">
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
                </div>
            </section>

        </div>

        {{-- Columna derecha --}}
        <div>
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
                        <form action="{{ route('payment.purchase', $course) }}" method="post">
                            @csrf

                           <div class="mb-2 text-sm">
                                <x-checkbox id="acceptance" name="acceptance" required/>
                                He leído y acepto los <a href="" class="text-teal-500 hover:text-teal-700">términos y condiciones</a>
                                <x-input-error for="acceptance" class="mt-2"></x-input-error>
                           </div>

                            <x-button color="teal" class="w-full justify-center rounded-md !text-sm h-12 mt-4">
                                Confirmar compra
                            </x-button>
                        </form>
                    </div>

                </div>
            </section>
        </div>

        </div>

    </div>
</x-app-layout>
