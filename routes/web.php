<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Livewire\CourseLearn;
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

Route::resource('courses', CourseController::class)->names('courses');

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
