<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__.'/auth.php';

Route::middleware('nocache')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/email/verify/{id}', function() {
        return view('email-verify');
    })->name('email.verify');
    
    Route::controller(IndexController::class)->group(function() {
        Route::get('/email/verified/{id}', 'verified')->name('email.verified');
        Route::post('/email/verify/{id}', 'resendVerify')->name('resend.verify');
    });
});

