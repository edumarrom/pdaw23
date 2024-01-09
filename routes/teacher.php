<?php

use App\Http\Controllers\Teacher\CourseController;
use App\Livewire\Teacher\CoursesContent;
use Illuminate\Support\Facades\Route;
// use App\Livewire\TeacherCourses;

/* Route::get('courses', TeacherCourses::class)
    ->middleware('can:course-read')
    ->name('courses.index'); */

Route::resource('courses', CourseController::class)
    ->names('courses');

Route::get('courses/{course}/edit/content', CoursesContent::class)
    ->name('courses.edit.content');
