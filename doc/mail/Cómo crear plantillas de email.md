[TOC]

# Cómo crear plantillas de email

Laravel ofrece la capacidad de cerar plantillas de email con Markdown.

## Crear una nueva plantilla

```bash
php artisan make:mail ApprovedCourse --markdown=emails.approved-course
```

Ese comando crea dos ficheros:

- Una clase _ApprovedCourse_ en `app/Mail`
- Una plantilla blade _approved-course_ en `resources/views/emails`

## Uso

En el método `__construct` de la clase se puede pasar información a la plantilla, y acceder a ella como se hace en cualquier plantilla blade, junto con la sintaxis de Markdown.

### En la clase
```php
public $course;
public function __construct(Course $course)
{
    $this->course = $course;
}
```

### En la plantilla
```php
<x-mail::message>
# 🎉¡Enhorabuena!👌

Te informamos que tu curso **"{{ $course->title }}"** ha sido aprobado y ya está disponible en la plataforma.

<x-mail::button :url="''">
Acceder a la plataforma
</x-mail::button>

Gracias por compartir tu conocimiento con nosotros ❤️,<br>
El equipo de {{ config('app.name') }}.
</x-mail::message>
```

## Probar la plantilla

Mediante tinker, podemos probar la plantilla con el siguiente comando:

```bash
Mail::to('fulano@detal.com')->send(new App\Mail\ApprovedCourse(App\Models\Course::find(1)));
```

## Uso

En el controlador, se puede enviar el email incluyendo la siguiente línea:

```php
Mail::to($course->teacher->email)->send(new ApprovedCourse($course));
```
