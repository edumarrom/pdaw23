<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Livewire\CourseLearn;
use App\Livewire\MyCourses;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::get('courses', CourseController::class)
    ->name('courses.index');

Route::get('courses/my-courses', MyCourses::class)
    ->middleware('auth')
    ->name('courses.my-courses');

Route::get('courses/{course}', [CourseController::class, 'show'])
    ->name('courses.show');

Route::post('courses/{course}/enroll', [CourseController::class, 'enroll'])
    ->middleware('auth')
    ->name('courses.enroll');

Route::get('courses/{course}/learn/{lesson?}', CourseLearn::class)
    ->middleware('auth')
    ->name('courses.learn');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Mailable Test Routes
|--------------------------------------------------------------------------
|
*/

// Usuario registrado

Route::get('/mailable/user-registered', function () {
    $user = App\Models\User::first();
    return new App\Mail\UserRegistered($user);
});

// Curso prouesto

Route::get('/mailable/course-proposed', function () {
    $course = App\Models\Course::find(50);
    $admins = App\Models\User::permission([1])->get();
    return new App\Mail\Admin\CourseProposed($course, $admins->first());
});

// Curso aprobado

Route::get('/mailable/course-approved', function () {
    $course = App\Models\Course::where('status', '3')->first();
    return new App\Mail\Teacher\CourseApproved($course);
});

// Curso rechazado

Route::get('/mailable/course-rejected', function () {
    $course = App\Models\Course::find(50);
    return new App\Mail\Teacher\CourseRejected($course);
});

// Nueva valoración de curso

Route::get('/mailable/course-reviewed', function () {
    $course = App\Models\Course::where('status', '3')->first();
    return new App\Mail\Teacher\CourseReviewed($course);
});

// Nuevo comentario en el curso

Route::get('/mailable/lesson-commented', function () {
    $course = App\Models\Lesson::first();
    return new App\Mail\Teacher\LessonCommented($course);
});
