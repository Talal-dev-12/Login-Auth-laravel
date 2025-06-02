<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

// Show login form
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Handle login form submission
Route::post('/login', [AuthController::class, 'login'])->name('check');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/register', function () {
    return view('admin.register');
});

Route::post('/register', [AuthController::class, 'register'])->name('registration');

Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'sendOTP']);

Route::get('/verify-otp', [AuthController::class, 'showOTPForm'])->name('verify.otp.form');
Route::post('/verify-otp', [AuthController::class, 'verifyOTP']);

Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('reset.password.form');
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
