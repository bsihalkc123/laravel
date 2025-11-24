<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// ----------------------
// Redirect home to login
// ----------------------
Route::redirect('/', '/login');

// ----------------------
// Authentication routes (for guests only)
// ----------------------
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'Submitlogin'])->name('login.submit');
});

// ----------------------
// Authenticated routes (only for logged-in users)
// ----------------------
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Students resource routes
    Route::resource('students', StudentController::class);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});
