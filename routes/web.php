<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'index'])->middleware('auth');
Route::get('/forgot-password', function(){
    return view('auth.forgot-password');
})->name('forgot-password');

Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');


Route::get('/register', function(){
    return view('auth.register');
})->name('register');

Route::get('/password-confirm', function(){
    return view('auth.passwords.reset');
})->name('reset');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::post('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('/register', [RegisterController::class, 'register']);
Auth::routes(['register' => false]);
