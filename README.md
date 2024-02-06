<p align="center"><img src="./storage/app/public/dabaliu_logo.png" width="200" alt="Laravel Logo"></p>

# Dabaliu - Plataforma de cursos online

## Descripción general del proyecto

Dabaliu es una plataforma de cursos online, donde se pondrá a disposición de los usuarios la posibilidad de comprar y matricularse en cursos de formación que pueden ser gratuitos o de pago. Del mismo modo se permitirá a los usuarios autorizados crear sus propios cursos y ofrecerlos desde la plataforma.

## Funcionalidad principal de la aplicación

Ofrecer un espacio de aprendizaje para usuarios interesados en obtener conocimientos, y una manera lucrativa de compartir conocimientos y enseñar a otros usuarios, con el atractivo de poder generar ingresos a través de sus cursos.

## Objetivos generales

- Ver el catálogo de cursos disponibles y gestionar los cursos adquiridos.
- Ofrecer un segumiento del curso a los alumnos y permitir a los alumnos realizar reseñas de los cursos adquiridos.
- Comunicaciones entre alumnos y profesores a través de comentarios.
- Gestionar los cursos publicados por los profesores y ofrecer a éstos un apartado de administración de los cursos aprobados o rechazados.

## Elemento de innovación

- Laravel 10: Es un framework para aplicaciones webs escrito en PHP y basado en el patrón MVC con el que relizaremos nuestra aplicación.
- Livewire: Es un framework para desarrollar el apartado frontend de nuestra aplicación en Laravel, permitiendo crear componentes dinámicos que podremos incluir a nuestras vistas para aportar interactividad.
- Jetstream: Se rata de un "starter kit" de Laravel, similar a Breeze, que mediante Tailwind CSS y Livewire nos brinda un punto de partida para desarrollar nuestra aplicación.
- LaravelPermissions: Es un paquete desarrollado por Spatie que nos permite administrar los permisos de los usuarios y roles.
- Pagos a través de Paypal: Vamos a ofrecer la posibildad de realizar pagos mediante Paypal, conectándonos a su API. Utilizaremos el entorno de pruebas "sandbox" que nos ofrece para realizar la implementación y verificar su funcionamiento en nuestra aplicación.

## Licencia

Esta aplicación y el Framework Laravel son software de código abierto licenciado bajo la [licencia MIT](https://opensource.org/licenses/MIT).

<br/>
<br/>
<br/>
<br/>

# Instalación

## Requisitos

Esta aplicación ha sido desarrollada con las siguientes versiones de software, por lo que se recomienda utilizar estas versiones o superiores para su correcto funcionamiento:

- PHP 8.2.15

- Composer 2.6.2

- Node.js 18.19.0

- NPM 10.2.3

- PostgreSQL 14.10

## Pasos para la instalación
1. Clonar el repositorio, ya sea:

    1. Mediante gh: `gh repo clone edumarrom/dabaliu`

    2. Mediante git `git clone https://github.com/edumarrom/dabaliu.git`

2. Instalar las dependencias de composer: `composer install`

3. Instalar las dependencias de npm: `npm install`

4. Crear el archivo .env a partir del .env.example: `cp .env.example .env`

5. Generar la clave de la aplicación: `php artisan key:generate`

6. Generar el enlace simbólico para el almacenamiento de archivos: `php artisan storage:link`

7. Configurar la base de datos en el archivo .env

8. Configurar el email y la contraseña del usuario admin en el archivo .env:

    ```env
    ADMIN_EMAIL="fulano@detal.com"
    ADMIN_PASSWORD="C0ntr@s3ñA"
    ```
    > Puedes dejar los valores por defecto si lo deseas.

9. Ejecutar las migraciones y los seeders: `php artisan migrate --seed`

10. Ejecutar el servidor de desarrollo: `php artisan serve`

11. Compilar los assets:

    1. `npm run build` para compilar los assets en producción.

    2. `npm run dev` para mantener al compilador a la escucha de cambios y compilarlos en tiempo real.

12. Acceder a la aplicación en el navegador: `http://dabaliu.test:8000`

<br/>
<br/>
<br/>
<br/>

# Inicio rápido

## Inicio

En la página inicial disponemos de un buscador de cursos, y más abajo una colección de los cursos más reciente y más valorados

## Página de cursos

La página de cursos nos muestra un catálogo de cursos disponibles, con la posibilidad de filtrar por categoría y nivel

## Ficha de curso

Ofrece información detallada del curso, contenido y valoraciones de los usuarios. Desde aquí podemos adquirir el curso. Si el curso es de pago el pago se procesa externamente a través de Paypal.

Si hemos adquirido el curso, podemos dejar nuestra valoración del mismo.

## Visor de lecciones

En esta página podemos ver el contenido del curso, así como un cajón de comentarios para comunicarnos con el profesor u otros alumnos.

Tenemos un panel con un resumen de nuestro progreso en el curso, y un botón para marcar la lección como completada. Podemos ver también nuestro progreso en las viñetas de la lista de lecciones.

## Mis cursos

En el desplegable de la barra de navegación tenemos un enlace a la página de mis cursos, donde podemos ver los cursos que hemos adquirido, junto a un buscador para localizar fácilmente un curso por su nombre, categoría, nivel o nombre del profesor.

# Profesores

## Panel de administración de cursos
Si somos profesores, podemos acceder a la página de administración de cursos desde el desplegable de la barra de navegación. Aquí podemos ver un listado que resume los cursos que hemos creado, y otros detalles como por ejemplo su estado.

> Un curso puede tener tres estados: Borrador, En revisión y Publicado.

## Crear un curso

Desde este panel podemos crear nuevo curso, rellenando un formulario con los datos básicos del mismo. Una vez creado, se nos habilita el editor del curso, donde podemos incluir el contenido del curso, sus metas y requisitos, además de otros detalles.

## Panel de gestión de un curso

Se trata de una página donde podemos gestionar los detalles de un curso en concreto. Tenemos un menú lateral desde que el que podemos navegar por losdistintos apartados de edición del curso.

### Información básica

Se trata de un formulario para editar la información que proporcionamos a la hora de crear un curso.

### Contenido del curso

Desde aquí podemos crear y editar las distintas lecciones del curso. Las lecciones van agrupadas en secciones, que nos servirán para organizar el contenido del curso.

Las lecciones consisten eun vídeo, que puede ser de Youtube o Vimeo, una descripción y, si lo deseamos, un archivo adjunto.

### Metas y requisitos

En este apartado definimos los objetivos que el alumno alcanzará al finalizar el curso, y los requisitos que debería cumplir si quiere realizar el curso.

### Alumnos matriculados

Desde aquí podemos una lista de los alumnos que se encuentran matriculados a nuestro curso, y la posibilidad de enviarles un correo electrónico.

## Solicitar revisión del curso

Si nuestro curso se encuentra en estado de borrador, podemos solicitar su revisión para notificar al administrador y pueda revisarlo para su publicación.

# Administración

## Panel de administración

Los administradores disponen de un panel de control donde poder gestionar la aplicación. Para acceder al panel pueden hacerlo desde el desplegable de la barra de navegación.

Desde este panel disponemos de un menu lateral que nos permite navegar por los distintos apartados de administración.

## Dashboard

El dashboard ofrece un resumen de la actividad de la aplicación, con una tarjetas que incluyen datos sobre lso cursos y los usuarios.

## Cursos

Desde este apartado podemos gestionar los cursos que han sido creados por los profesores. Podemos ver un listado de los cursos, además de un buscador y un filtrado por estado.

### Revisar un curso

Los cursos que se encuentran pendientes de revisión disponen de un enlace a una previsualización de su ficha, donde podemos ver si la información del curso.

Si el curso cumple los requisitos mínimos, tenemos la opción de aprobarlo o rechazarlo. Se le notificará al profesor en cualquiera de los dos casos. en el caso de rechazarlo, el curso vuelve al estado de borrador para que el profesor pueda revisarlo y volver a propornerlo para su publicación.

### Suspender un curso

Si por alguna razón fuese necesario, podemos suspender un curso que se encuentre publicado. De este modo el curso dejará de estar disponible en la plataforma, hasta que el profesor solicite de nuevo su revisión.

## Categoías

Desde este apartado podemos gestionar las categorías disponibles para los cursos.

## Niveles

Desde este apartado podemos gestionar los niveles disponibles para los cursos.

## Precios

Desde este apartado podemos gestionar los precios disponibles para los cursos.

## Usuarios

Desde este apartado podemos gestionar los usuarios de la aplicación. Podemos ver un listado de los usuarios, además de un buscador que nos permite buscar por nombre, email o rol.

## Roles

Desde este apartado podemos gestionar los roles disponibles para los usuarios. A la hora de crear o editar un rol disponemos de una tabla de permisos que nos permite asignar o retirar permisos sobre los distintos elementos de la aplicación.
