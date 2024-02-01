<x-mail::message>

<a href="{{config('app.url')}}">
    <img src="{{ $message->embed('storage/dabaliu_logo.png') }}" alt="{{ config('app.name') }}" width="100" height="100" style="display: block; margin: 0 auto;">
</a>

# ¡Hola {{ $teacher->name }}!

Acabas de recibir una valoración de tu curso <strong>{{ $course->title }}</strong>.

Puedes ver la valoración accediendo desde este enlace:

<x-mail::button :url="$show" color="teal">
Acceder al curso
</x-mail::button>

Gracias por compartir tu conocimiento con nosotros ❤️,<br>
El equipo de {{ config('app.name') }}
</x-mail::message>
