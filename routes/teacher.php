<?php

use App\Http\Controllers\Teacher\CourseController;
use App\Livewire\Teacher\CoursesContent;
use App\Livewire\Teacher\CoursesStudents;
use Illuminate\Support\Facades\Route;
// use App\Livewire\TeacherCourses;

/* Route::get('courses', TeacherCourses::class)
    ->middleware('can:course-read')
    ->name('courses.index'); */

Route::resource('courses', CourseController::class)
    ->names('courses');

Route::get('courses/{course}/edit/content', CoursesContent::class)
    ->name('courses.edit.content');

Route::get('courses/{course}/edit/goals', [CourseController::class, 'goals'])
    ->name('courses.edit.goals');

Route::get('courses/{course}/edit/students', CoursesStudents::class)
    ->name('courses.edit.students');
