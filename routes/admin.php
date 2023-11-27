<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {

    session()->flash('swal', [
        'type' => 'success',
        'title' => 'Hola mundo',
        'text' => 'Esto es un modal de prueba',
        'icon' => 'success',
    ]);

    return view('admin.dashboard');
})->name('admin.dashboard');
