<div id="informational-banner" tabindex="-1"
    x-data="{ show: true }" x-show="show"
    class="fixed bottom-0 start-0 z-50 flex flex-col justify-between items-center w-full p-4 border-b md:flex-row bg-gray-700 border-gray-600">
    <div class="m-2">
        <i class="fa-solid fa-cookie-bite text-8xl text-gray-400"></i>
    </div>
    <div class="mb-4 md:mb-0 md:me-4">
        <h2 class="mb-1 text-base font-semibold text-white">A nadie le amarga un dulce</h2>
        <p class=" text-sm font-normal text-gray-200">
            Por eso queremos informarte que en nuestro sitio web utilizamos cookies
            para mejorar tu experiencia de uso. Estas cookies nos permiten recordar tus preferencias
            y personalizar el contenido que te ofrecemos. Es importante destacar que en Dabaliu no
            utilizamos cookies con fines publicitarios. Nos enfocamos en garantizar una navegación
            más fluida y adaptada a tus necesidades sin invadir tu privacidad con anuncios personalizados.
            Si estás de acuerdo con el uso de cookies con estos fines, simplemente haz clic en
            "Aceptar cookies", de lo contrario siéntete libre de rechazarlas. Queremos que te sientas
            cómodo navegando en Dabaliu, así que no dudes en explorar más detalles sobre nuestro uso
            de cookies en nuestra <span class="underline">Política de Privacidad</span>. ¡Gracias por ser parte de Dabaliu y disfruta
            de tu visita!
        </p>
    </div>
    <div class="flex items-center flex-shrink-0 space-x-4">
        <form wire:submit.prevent="denyCookies">
            <x-button color="gray" class="!text-sm normal-case tracking-normal hover:border-gray-400"
            x-on:click="show = false">Rechazar cookies</x-button>
        </form>

        <form wire:submit.prevent="acceptCookies">
            <x-button color="teal" class="!text-sm normal-case tracking-normal"
            x-on:click="show = false">Aceptar cookies</x-button>
        </form>
    </div>
</div>
