<x-mail::message>

<a href="{{config('app.url')}}" style="text-decoration: none;">
    <img src="{{ $message->embed('storage/dabaliu_logo.png') }}" alt="{{ config('app.name') }}" width="100" height="100" style="display: block; margin: 0 auto;">
    <p style="font-size: 1.5rem; line-height: 2rem; font-weight: 600; text-align: center; color: #000; text-decoration: none;">{{ config('app.name') }}</p>
</a>

# ¡Hola {{ $teacher->name }}!

Acabas de recibir un nuevo comentario en tu lección:
<strong>{{ $lesson->title }}</strong>
del curso <strong>{{ $course->title }}</strong>.

Puedes ver el comentario accediendo desde este enlace:

<x-mail::button :url="$learn" color="teal">
Acceder a la lección
</x-mail::button>

Gracias por compartir tu conocimiento con nosotros ❤️,<br>
El equipo de {{ config('app.name') }}
</x-mail::message>
