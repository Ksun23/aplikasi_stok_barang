<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Public routes

Route::get('/', function () {
    return view('home');
});

Route::get('/', [HomeController::class, 'Home'])->name('home');
Route::get('/about', [AboutController::class, 'About'])->name('about');
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact'); 
Route::get('/login', [LoginController::class, 'Login'])->name('auth.login');
Route::get('/register', [RegisterController::class, 'Register'])->name('auth.register');
Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard.index');
Route::get('/admin', [AdminController::class, 'Admin'])->name('admin.index');

Route::post('/register-user', [RegisterController::class, 'RegisterUser'])->name('RegisterUser');
Route::post('/login-user', [LoginController::class, 'LoginUser'])->name('LoginUser');
Route::post('/tambah-barang', [DashboardController::class, 'tambahbarang'])->name('tambahbarang');

Route::get('/logout', function() {
    Auth::logout();
    return redirect()->to('/')->with('success', 'Logged out successfully'); 
})->name('logout')->middleware('auth');
