<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Rutas protegidas (requieren autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // CRUD de notas
    Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
    Route::resource('notes', NoteController::class);
    Route::get('notes/{note}/download', [NoteController::class, 'downloadPDF'])->name('notes.downloadPDF');
});

// Rutas adicionales como almacenamiento o redirección
Route::get('storage/{path}', 'Illuminate\Routing\RedirectController@storage')->name('storage.local');
Route::get('/up', 'Illuminate\Routing\RedirectController@home')->name('up');