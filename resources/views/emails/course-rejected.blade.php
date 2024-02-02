<x-mail::message>

<a href="{{config('app.url')}}" style="text-decoration: none;">
    <img src="{{ $message->embed('storage/dabaliu_logo.png') }}" alt="{{ config('app.name') }}" width="100" height="100" style="display: block; margin: 0 auto;">
    <p style="font-size: 1.5rem; line-height: 2rem; font-weight: 600; text-align: center; color: #000; text-decoration: none;">{{ config('app.name') }}</p>
</a>

# Malas noticias 😥

Te informamos que tu curso **"{{ $course->title }}"** ha sido rechazado.

¡Pero no pierdas la esperanza! A continuación te damos unos consejos para que puedas volver a enviarlo y sea aprobado:

- Asegúrate de que tu curso cumpla con todos los **requisitos de calidad**.
- Revisa que tu curso ofrezca una **información clara y atractiva**.
- Comprueba que el contenido de tu curso sea **comprensible**.
- Los vídeos de tu curso deben tener una **buena calidad de audio y vídeo**.
- Unas **metas y requisitos bien definidos** ayudan a entender que esperar del curso.

Tu curso ha vuelto al estado de borrador, por lo que puedes editarlo y volver a enviarlo para que sea revisado.
Puedes ver el estado de tu curso desde este enlace:

<x-mail::button :url="$edit" color="teal">
Acceder a mi curso
</x-mail::button>

Si necesitas más ayuda, puedes consultar nuestra [Guía para crear un curso]().
{{-- Si tienes alguna duda, puedes contactar con nosotros a través de este correo electrónico. --}}

Eso es todo. ¡Esperamos volver a verte pronto! 👋



Gracias por compartir tu conocimiento con nosotros ❤️,<br>
El equipo de {{ config('app.name') }}
</x-mail::message>
