<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Payment Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/checkout/{course}', [PaymentController::class, 'checkout'])->name('checkout');
