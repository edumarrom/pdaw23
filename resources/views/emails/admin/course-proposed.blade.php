<x-mail::message>

<a href="{{config('app.url')}}" style="text-decoration: none;">
    <img src="{{ $message->embed('storage/dabaliu_logo.png') }}" alt="{{ config('app.name') }}" width="100" height="100" style="display: block; margin: 0 auto;">
    <p style="font-size: 1.5rem; line-height: 2rem; font-weight: 600; text-align: center; color: #000; text-decoration: none;">{{ config('app.name') }}</p>
</a>

# Hola {{ $admin->name }},

El profesor **{{ $teacher->name }}** ha propuesto un nuevo curso:

<x-mail::table>
| Título             | Categoría                   | Nivel                    | Precio                                                 |
| :----------------- |:----------------------------|:-------------------------|:-------------------------------------------------------|
| {{$course->title}} | {{$course->category->name}} | {{$course->level->name}} | {{$course->price->name}} ({{$course->price->value}} €) |
</x-mail::table>

Puedes realizar la revisión del curso desde el siguiente enlace:

<x-mail::button :url="$show" color="teal">
Revisar curso
</x-mail::button>

{{ config('app.name') }}
</x-mail::message>
