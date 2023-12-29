<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TeacherCourses;

Route::get('courses', TeacherCourses::class)
    ->name('courses.index');
