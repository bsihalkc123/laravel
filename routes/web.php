<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ContactUsController;

// -----------------------
// FRONTEND (Home page)
// -----------------------
Route::get('/', [ContactUsController::class, 'create'])->name('frontdashboard');
Route::post('/contactus', [ContactUsController::class, 'store'])->name('contactus.store');
// Route::get('/about-us', function () {return view('aboutus'); })->name('aboutus');

// -----------------------
// AUTHENTICATION
// -----------------------
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'Submitlogin'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// -----------------------
// ADMIN DASHBOARD
// -----------------------
Route::get('/dashboard', [AdminDashboardController::class,'index'])
    ->middleware('auth')
    ->name('Admindashboard');

// -----------------------
// RESOURCE ROUTES
// -----------------------

// Admin-only routes
Route::middleware(['auth','role:admin'])->group(function () {
    Route::resource('students', StudentController::class)
        ->middleware('permission:manage students');
    Route::resource('teachers', TeacherController::class)
        ->middleware('permission:manage teachers');
});

// Admin or Teacher routes
Route::middleware(['auth','role_or_permission:admin|teacher'])->group(function () {
    Route::resource('courses', CourseController::class)
        ->middleware('permission:manage courses');
    Route::resource('subjects', SubjectController::class)
        ->middleware('permission:manage subjects');
    Route::resource('exams', ExamController::class)
        ->middleware('permission:manage exams');    
});

// Teacher-only routes
Route::middleware(['auth','role:teacher'])->group(function () {
    Route::resource('exams', ExamController::class)
        ->middleware('permission:manage exams');
    Route::resource('results', ResultController::class)
        ->middleware('permission:manage results');
    Route::resource('enrollments', EnrollmentController::class)
        ->middleware('permission:manage enrollments');
});

// Students (and admins) can only view students
Route::middleware(['auth', 'role:student|admin|teacher'])->group(function () {
    Route::resource('students', StudentController::class)
        ->only(['index', 'show']);
    Route::middleware([]); 
    Route::resource('teachers', TeacherController::class)
        ->only(['index', 'show']);  
    Route::resource('courses', CourseController::class)
        ->only(['index', 'show']);
    Route::resource('subjects', SubjectController::class)
        ->only(['index', 'show']);
    Route::resource('exams', ExamController::class)
        ->only(['index', 'show']);
    Route::resource('results', ResultController::class)
        ->only(['index', 'show']);
});


// -----------------------
// ADMIN CONTACT MESSAGES
// -----------------------
Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/contactus', [ContactUsController::class, 'index'])
        ->name('contactus.index')
        ->middleware('permission:view contact messages');
    Route::get('/contactus/{id}/edit', [ContactUsController::class, 'edit'])
        ->name('contactus.edit')
        ->middleware('permission:edit contact messages');
    Route::put('/contactus/{id}', [ContactUsController::class, 'update'])
        ->name('contactus.update')
        ->middleware('permission:edit contact messages');
    Route::delete('/contactus/{id}', [ContactUsController::class, 'destroy'])
        ->name('contactus.destroy')
        ->middleware('permission:delete contact messages');
});  