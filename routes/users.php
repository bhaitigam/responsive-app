<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;

Route::get('/SignUp', [UserController::class, 'SignUp'])->name('signup');
Route::get('/VerifyOtp', [UserController::class, 'VerifyOtp'])->name('verify-otp');
Route::get('/SignIn', [UserController::class, 'SignIn'])->name('signin');       
Route::get('/forgot-password', [UserController::class, 'forgotPassword'])->name('forgot-password');
Route::get('/change-password', [UserController::class, 'changePassword'])->name('change-password');