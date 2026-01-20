<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\FormationController;

// Route::get('/', function () {
//     return view('login');
// });
// Route::get('/login', function () {
//     return view('login');
// })->name('login');
// Route::get('/register', function () {
//     return view('register');
// })->name('register');
// Route::post('/login',[App\Http\Controllers\UserController::class,'login'])->name('login');

Route::get('/login',[App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('/dologin',[App\Http\Controllers\AuthController::class,'Dologin'])->name('dologin');

Route::get('/register',[App\Http\Controllers\AuthController::class,'register'])->name('register');





Route::get('/dashboard',function(){
    return view('admin.dashboard');
});

// User Routes
Route::get('/user/create',[App\Http\Controllers\UserController::class,'create'])->name('user.create');
Route::post('/user/store',[App\Http\Controllers\UserController::class,'store'])->name('user.store');
Route::get('/user/index',[App\Http\Controllers\UserController::class,'index'])->name('user.index');
Route::get('/user/edit/{id}',[App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
Route::post('/user/update/{id}',[App\Http\Controllers\UserController::class,'update'])->name('user.update');
Route::delete('/user/destroy/{id}',[App\Http\Controllers\UserController::class,'destroy'])->name('user.destroy');



// Formateur Routes
Route::get('/formateur/create',[App\Http\Controllers\FormateurController::class,'create'])->name('formateur.create');
Route::post('/formateur/store',[App\Http\Controllers\FormateurController::class,'store'])->name('formateur.store');
Route::get('/formateur/index',[App\Http\Controllers\FormateurController::class,'index'])->name('formateur.index');
Route::get('/formateur/edit/{id}',[App\Http\Controllers\FormateurController::class,'edit'])->name('formateur.edit');
Route::post('/formateur/update/{id}',[App\Http\Controllers\FormateurController::class,'update'])->name('formateur.update');
Route::delete('/formateur/destroy/{id}',[App\Http\Controllers\FormateurController::class,'destroy'])->name('formateur.destroy');



// Formation Routes
Route::get('/formation/create',[App\Http\Controllers\FormationController::class,'create'])->name('formation.create');
Route::post('/formation/store',[App\Http\Controllers\FormationController::class,'store'])->name('formation.store');
Route::get('/formation/index',[App\Http\Controllers\FormationController::class,'index'])->name('formation.index');
Route::get('/formation/edit/{id}',[App\Http\Controllers\FormationController::class,'edit'])->name('formation.edit');
Route::post('/formation/update/{id}',[App\Http\Controllers\FormationController::class,'update'])->name('formation.update');
Route::delete('/formation/destroy/{id}',[App\Http\Controllers\FormationController::class,'destroy'])->name('formation.destroy');