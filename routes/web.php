<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TambahcategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangrusakController;
use App\Http\Controllers\KategoriController;
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
Route::get('/dashboard/tambahCategory', [TambahcategoryController::class, 'TambahCategory'])->name('dashboard.tambahcategory.index');
Route::get('/dashboard/barangrusak', [BarangrusakController::class, 'Barangrusak'])->name('dashboard.barangrusak.index');
Route::get('/admin', [AdminController::class, 'Admin'])->name('admin.index');
Route::get('/logout', function() {
    Auth::logout();
    return redirect()->to('/')->with('success', 'Logged out successfully'); 
})->name('logout')->middleware('auth');
Route::get('/dashboard/tambah', [DashboardController::class, 'create'])->name('dashboard.tambah');

Route::post('/register-user', [RegisterController::class, 'RegisterUser'])->name('RegisterUser');
Route::post('/login-user', [LoginController::class, 'LoginUser'])->name('LoginUser');
Route::post('/dashboard/store', [DashboardController::class, 'store'])->name('dashboard.store');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::put('/dashboard/update/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

// Add these routes after your other dashboard routes
Route::get('/dashboard/edit/{id}', [DashboardController::class, 'edit'])->name('dashboard.edit');
Route::put('/dashboard/update/{id}', [DashboardController::class, 'update'])->name('dashboard.update');

// Kategori Routes
Route::prefix('kategori')->group(function () {
    Route::get('/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::post('/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    Route::get('/create', [KategoriController::class, 'create'])->name('kategori.create');
});

// Barangrusak Routes
Route::prefix('dashboard')->group(function () {
    Route::get('/barangrusak', [BarangRusakController::class, 'index'])->name('barangrusak.index');
    Route::delete('/barangrusak/{id}', [BarangRusakController::class, 'destroy'])->name('barangrusak.destroy');
    Route::post('/barangrusak/{id}/recover', [BarangRusakController::class, 'recover'])->name('barangrusak.recover');
});


