<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ResultController;

// Redirect home to login
Route::redirect('/', '/login');

// Guest routes (only for unauthenticated users)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'Submitlogin'])->name('login.submit');
});

// Authenticated routes
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // -----------------------------
    // Backend resources (prefixed)
    // -----------------------------
    Route::prefix('backend')->name('backend.')->group(function () {
        Route::resource('students', StudentController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('subjects', SubjectController::class);
        Route::resource('exams', ExamController::class);
    });

    // -----------------------------
    // Results (no prefix)
    // -----------------------------
    Route::resource('results', ResultController::class);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
