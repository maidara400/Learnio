<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. Page d'accueil
Route::get('/', function () {
    return view('BIENVENU');
});

// 2. Dashboard pour les utilisateurs simples (Apprenants)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. Gestion du profil (généré par Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 4. ZONE SÉCURISÉE POUR L'ADMIN (Ton travail)
Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/admin/dashboard', function () {
        return "Bienvenue Saidina ! Tu es sur l'espace Administrateur sécurisé.";
    })->name('admin.dashboard');

    // Vos futures routes de groupe (ex: formations) iront ici
});

// 5. Routes d'authentification (Login, Register, etc.)
require __DIR__.'/auth.php';