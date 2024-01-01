<?php

use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\PermissionController;
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

Route::resource('/levels', LevelController::class)->names('levels');

Route::resource('/roles', RoleController::class)->names('roles')->except('show');

Route::resource('/permissions', PermissionController::class)->names('permissions')->except('show');

Route::resource('/users', UserController::class)->names('users')->except('show');
