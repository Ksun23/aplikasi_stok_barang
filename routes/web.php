<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

// Public routes
Route::get('/', [HomeController::class, 'Home'])->name('home');
Route::get('/about', [AboutController::class, 'About'])->name('about.index');
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'Login'])->name('auth.login');
    Route::get('/register', [RegisterController::class, 'Register'])->name('auth.register');
    Route::post('/register-user', [RegisterController::class, 'RegisterUser'])->name('auth.register.store');
    Route::post('/login-user', [LoginController::class, 'LoginUser'])->name('auth.login.store');
});

// Protected dashboard routes
Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

// Logout route
Route::post('/logout', function() {
    Auth::logout();
    return redirect()->route('auth.login')->with('success', 'Logged out successfully'); 
})->name('auth.logout')->middleware('auth');

