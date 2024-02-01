<x-mail::message>

<a href="{{config('app.url')}}">
    <img src="{{ $message->embed('storage/dabaliu_logo.png') }}" alt="{{ config('app.name') }}" width="100" height="100" style="display: block; margin: 0 auto;">
</a>

# Hola {{ $admin->name }},

El profesor **{{ $teacher->name }}** ha propuesto un nuevo curso:

<x-mail::table>
| Título             | Categoría                   | Nivel                    | Precio                                           |
| :----------------- |:----------------------------|:-------------------------|:-------------------------------------------------|
| {{$course->title}} | {{$course->category->name}} | {{$course->level->name}} | {{$course->price->name}} ({{$course->price->value}} €) |
</x-mail::table>

Puedes realizar la revisión del curso desde el siguiente enlace:

<x-mail::button :url="$show" color="teal">
Revisar curso
</x-mail::button>

{{ config('app.name') }}
</x-mail::message>
