<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ContactUsController;

// Redirect home to login
Route::redirect('/','/login');

// Guest routes (unauthenticated users)
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'Submitlogin'])->name('login.submit');

    // User dashboard landing page with login button
    Route::get('/user/dashboard', [UserDashboardController::class, 'landingPage'])
        ->name('user.dashboard.landing');
});

// Authenticated routes
Route::middleware('auth')->group(function () {

    // Admin dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // User dashboard after login
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::post('/user/dashboard/contact', [UserDashboardController::class, 'storeContact'])->name('user.dashboard.contact');

    // Resource routes
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('exams', ExamController::class);
    Route::resource('enrollments', EnrollmentController::class);
    Route::resource('results', ResultController::class);
    Route::resource('contactus', ContactUsController::class);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
