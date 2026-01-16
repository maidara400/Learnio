<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Page d'accueil du projet Learnio
Route::get('/', function () {
    return view('BIENVENU');
});

// 2. Dashboard standard (pour les apprenants)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. Groupe de routes pour le profil utilisateur (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 4. ZONE ADMIN SÉCURISÉE (Ton travail principal)
// Cette zone n'est accessible que si l'utilisateur est connecté ET admin
Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/admin/dashboard', function () {
        return view('admin-dashboard'); // Charge ta nouvelle page personnalisée
    })->name('admin.dashboard');

    // Les membres de ton groupe pourront ajouter leurs routes de gestion ici
});

// 5. Chargement des routes d'authentification (login, register, etc.)
require __DIR__.'/auth.php';