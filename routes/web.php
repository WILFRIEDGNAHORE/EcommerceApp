<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Routes web de l'application
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Routes publiques
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Routes protégées – Authentification requise
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Routes par rôle
|--------------------------------------------------------------------------
*/

/*
| Admin
*/
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin', fn () => view('admin.dashboard'))->name('admin.dashboard');
});

/*
| Vendor
*/
Route::middleware(['auth', 'verified', 'vendor'])->group(function () {
    Route::get('/vendor', fn () => view('vendor.dashboard'))->name('vendor.dashboard');
});

/*
| Customer
*/
Route::middleware(['auth', 'verified', 'customer'])->group(function () {
    Route::get('/account', fn () => view('customer.dashboard'))->name('customer.dashboard');
});

/*
|--------------------------------------------------------------------------
| Routes d'authentification
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
