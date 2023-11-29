<?php

use App\Http\Controllers\Admin\LevelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('/levels', LevelController::class)->names('levels');
