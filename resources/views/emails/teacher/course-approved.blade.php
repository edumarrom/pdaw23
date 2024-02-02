<x-mail::message>

<a href="{{config('app.url')}}" style="text-decoration: none;">
    <img src="{{ $message->embed('storage/dabaliu_logo.png') }}" alt="{{ config('app.name') }}" width="100" height="100" style="display: block; margin: 0 auto;">
    <p style="font-size: 1.5rem; line-height: 2rem; font-weight: 600; text-align: center; color: #000; text-decoration: none;">{{ config('app.name') }}</p>
</a>

# ¡Enhorabuena! 🎉

Te informamos que tu curso **"{{ $course->title }}"** ha sido aprobado y ya está disponible en la plataforma.

Recuerda que puedes acceder a la plataforma para ver el estado de tu curso y realizar cualquier cambio que consideres necesario.

Puedes ver la ficha de tu curso accediendo al siguiente enlace:

<x-mail::button :url="$show" color="teal">
Acceder a mi curso
</x-mail::button>

Gracias por compartir tu conocimiento con nosotros ❤️,<br>
El equipo de {{ config('app.name') }}.
</x-mail::message>
