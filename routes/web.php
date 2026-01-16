<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
