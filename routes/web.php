<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboardcontroller;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'showLoginForm']) ->name('Login'); 
Route::post('/login', [AuthController::class, 'Submitlogin']) ->name('login.submit');
Route::get('/dashboard', [Dashboardcontroller::class,'index'])->name('dashboard');
Route::get('/logout', [AuthController::class, ''])->name('');