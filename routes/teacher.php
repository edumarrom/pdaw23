<?php

use App\Http\Controllers\Teacher\CourseController;
use Illuminate\Support\Facades\Route;
// use App\Livewire\TeacherCourses;

/* Route::get('courses', TeacherCourses::class)
    ->middleware('can:course-read')
    ->name('courses.index'); */

Route::resource('courses', CourseController::class)
    ->names('courses');
