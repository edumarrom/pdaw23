<x-mail::message>

<a href="{{config('app.url')}}" style="text-decoration: none;">
    <img src="{{ $message->embed('storage/dabaliu_logo.png') }}" alt="{{ config('app.name') }}" width="100" height="100" style="display: block; margin: 0 auto;">
    <p style="font-size: 1.5rem; line-height: 2rem; font-weight: 600; text-align: center; color: #000; text-decoration: none;">{{ config('app.name') }}</p>
</a>

# ¡Bienvenido {{$user->name}}!

Nos alegra mucho que hayas decidido unirte a nosotros. Estamos deseando que empieces a aprender y disfrutar de nuestros cursos.

Puedes acceder a la plataforma desde el siguiente enlace:

<x-mail::button :url="$index" color="teal">
Acceder a la plataforma
</x-mail::button>

Gracias por aprender con nosotros ❤️,<br>
El equipo de {{ config('app.name') }}
</x-mail::message>
