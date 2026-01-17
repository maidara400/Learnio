<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormateurController;

Route::get('/', function () {
    return view('welcome');
});








Route::get('/dashboard',function(){
    return view('admin.dashboard');
});
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
