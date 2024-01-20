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

// Route::post('/checkout/{course}/purchase', [PaymentController::class, 'purchase'])->name('purchase');

Route::controller(PaymentController::class)
    ->group(function () {
        Route::post('handle-payment/{course}', 'handlePayment')->name('handle');
        Route::get('cancel-payment/{course}', 'paymentCancel')->name('cancel');
        Route::get('payment-success/{course}', 'paymentSuccess')->name('success');
    });
