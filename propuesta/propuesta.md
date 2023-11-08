% Dabaliu
% Eduardo Martínez Romero
% Curso 2023 / 24

# Descripción general del proyecto

Dabaliu es una plataforma de cursos online, donde se pondrá a disposición de los usuarios la posibilidad de comprar y matricularse en cursos de formación que pueden ser gratuitos o de pago. Del mismo modo se permitirá a los usuarios autorizados crear sus propios cursos y ofrecerlos desde la plataforma.

## Funcionalidad principal de la aplicación

Ofrecer un espacio de aprendizaje para usuarios interesados en obtener conocimientos, y una manera lucrativa de compartir conocimientos y enseñar a otros usuarios, con el atractivo de poder generar ingresos a través de sus cursos.

## Objetivos generales

- Ver el catálogo de cursos disponibles y gestionar los cursos adquiridos.
- Ofrecer un segumiento del curso a los alumnos y permitir a los alumnos realizar reseñas de los cursos adquiridos.
- Comunicaciones entre alumnos y profesores a través de comentarios.
- Gestionar los cursos publicados por los profesores y ofrecer a éstos un apartado de administración de los cursos aprobados o rechazados.

# Elemento de innovación

- Laravel 10: Es un framework para aplicaciones webs escrito en PHP y basado en el patrón MVC con el que relizaremos nuestra aplicación.
- Livewire: Es un framework para desarrollar el apartado frontend de nuestra aplicación en Laravel, permitiendo crear componentes dinámicos que podremos incluir a nuestras vistas para aportar interactividad.
- Jetstream: Se rata de un "starter kit" de Laravel, similar a Breeze, que mediante Tailwind CSS y Livewire nos brinda un punto de partida para desarrollar nuestra aplicación.
- LaravelPermissions: Es un paquete desarrollado por Spatie que nos permite administrar los permisos de los usuarios y roles.
- Laravel AdminLTE: Es un paquete desarrollado por jeroennoten que nos ofrece una serie de plantillas y recursos con los que desarrollar un panel administrativo.
- Pagos a través de Paypal: Vamos a ofrecer la posibildad de realizar pagos mediante Paypal, conectándonos a su API. Utilizaremos el entorno de pruebas "sandbox" que nos ofrece para realizar la implementación y verificar su funcionamiento en nuestra aplicación.
- Pusher (Opcional): Es un servicio desarrollado por MessageBird que nos permitirá emitir notificaciones a los usuarios de la aplicación
- Laravel Echo (Opcional): Es una librería de Laravel que nos facilita la integración de Pusher con nuestra aplicación.
