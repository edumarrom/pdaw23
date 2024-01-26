<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {return view('admin.dashboard');})->name('dashboard');

Route::resource('/categories', CategoryController::class)->names('categories')->except('show');

Route::resource('/levels', LevelController::class)->names('levels')->except('show');

Route::resource('/prices', PriceController::class)->names('prices')->except('show');

Route::resource('/roles', RoleController::class)->names('roles')->except('show');

// Route::resource('/permissions', PermissionController::class)->names('permissions')->except('show');

Route::resource('/users', UserController::class)->names('users')->except('show');

Route::get('courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::post('courses/{course}/approve', [CourseController::class, 'approve'])->name('courses.approve');

Route::post('courses/{course}/reject', [CourseController::class, 'reject'])->name('courses.reject');
