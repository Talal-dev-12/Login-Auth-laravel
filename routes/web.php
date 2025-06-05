<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

// Show login form
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Handle login form submission
Route::post('/', [AuthController::class, 'login'])->name('check');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/register', function () {
    return view('admin.register');
});

Route::post('/register', [AuthController::class, 'register'])->name('registration');

Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'sendOTP'])->name('OtpSend');

Route::get('/verify-otp', [AuthController::class, 'showOTPForm'])->name('verify.otp.form')->middleware('otp.verified');
Route::post('/verify-otp', [AuthController::class, 'verifyOTP'])->name('CheckOtp')->middleware('otp.verified');

Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('reset.password.form')->middleware('otp.verified');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('resetPassword')->middleware('otp.verified');
