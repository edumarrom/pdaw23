<x-mail::message>

<a href="{{config('app.url')}}">
    <img src="{{ $message->embed('storage/dabaliu_logo.png') }}" alt="{{ config('app.name') }}" width="100" height="100" style="display: block; margin: 0 auto;">
</a>

# ¡Enhorabuena por tu nueva adquisición! 🎉

A continuación te mostramos un resumen del curso recién adquirido:

<x-mail::table>
| Curso              | Profesor                   | Precio                |
| :----------------- |:---------------------------|:----------------------|
| {{$course->title}} | {{$course->teacher->name}} | {{$course->priceEur}} |
</x-mail::table>

Esperamos que lo disfrutes y aprendas mucho con él.

Puedes acceder cuando quieras a tu curso desde el siguiente enlace:

<x-mail::button :url="$learn" color="teal">
Acceder al curso
</x-mail::button>

Gracias por aprender con nosotros ❤️,<br>
El equipo de {{ config('app.name') }}
</x-mail::message>
