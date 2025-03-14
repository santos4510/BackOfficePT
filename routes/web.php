<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\checkidade;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    echo "Isto é a home page";
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contacto', [ContactoController::class, 'index'])->middleware(checkidade::class);

require __DIR__.'/auth.php';
