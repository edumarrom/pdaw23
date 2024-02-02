<x-mail::message>

<a href="{{config('app.url')}}" style="text-decoration: none;">
    <img src="{{ $message->embed('storage/dabaliu_logo.png') }}" alt="{{ config('app.name') }}" width="100" height="100" style="display: block; margin: 0 auto;">
    <p style="font-size: 1.5rem; line-height: 2rem; font-weight: 600; text-align: center; color: #000; text-decoration: none;">Dabaliu</p>
</a>

# ¡Enhorabuena! 🎉

Queremos felicitarte por haber completado el curso **{{$course->title}}**.

Esperamos que este curso te haya gustado y hayas aprendido mucho con él.

# Cuéntanos cómo te ha ido

Nos encantaría saber tu opinión sobre el curso. ¿Qué es lo que más te ha gustado?
¿Qué podría mejorar? Tu opinión puede ser de mucha ayuda para el profesor y para otros estudiantes.

Si quieres, puedes dejar tu opinión en el siguiente enlace:

<x-mail::button :url="$reviews" color="teal">
Valorar el curso
</x-mail::button>

# ¿Qué puedes hacer ahora?

Puedes seguir aprendiendo con nosotros. Tenemos muchos otros cursos que pueden interesarte.

¿Por qué no les echas un vistazo?

<x-mail::button :url="$courses">
Ver otros cursos
</x-mail::button>

Gracias por aprender con nosotros ❤️,<br>
El equipo de {{ config('app.name') }}
</x-mail::message>
