<x-mail::message>
# 🎉¡Enhorabuena!👌

Te informamos que tu curso **"{{ $course->title }}"** ha sido aprobado y ya está disponible en la plataforma.

<x-mail::button :url="''">
Acceder a la plataforma
</x-mail::button>

Gracias por compartir tu conocimiento con nosotros ❤️,<br>
El equipo de {{ config('app.name') }}.
</x-mail::message>
