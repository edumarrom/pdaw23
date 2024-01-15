<x-mail::message>
# 💥 Malas noticias 😥

Te informamos que tu curso **"{{ $course->title }}"** ha sido rechazado.

¡Pero no pierdas la esperanza! A continuación te damos unos consejos para que puedas volver a enviarlo y sea aprobado:

- Asegúrate de que tu curso cumpla con todos los **requisitos de calidad**.
- Revisa que tu curso ofrezca una **información clara y atractiva**.
- Comprueba que el contenido de tu curso sea **comprensible**.
- Los vídeos de tu curso deben tener una **buena calidad de audio y vídeo**.
- Unas **metas y requisitos bien definidos** ayudan a entender que esperar del curso.

Tu curso ha vuelto al estado de borrador, por lo que puedes editarlo y volver a enviarlo para que sea revisado.
Recuerda que puedes ver el estado de tu curso en todo momento desde tu [Panel de Instructor]().

Si necesitas más ayuda, puedes consultar nuestra [Guía para crear un curso]().
{{-- Si tienes alguna duda, puedes contactar con nosotros a través de este correo electrónico. --}}

Eso es todo. ¡Esperamos volver a verte pronto! 😄

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Gracias por compartir tu conocimiento con nosotros ❤️,<br>
El equipo de {{ config('app.name') }}
</x-mail::message>
