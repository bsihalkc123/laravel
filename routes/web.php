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

// -----------------------
// AUTHENTICATION
// -----------------------
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'Submitlogin'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// -----------------------
// ADMIN DASHBOARD
// -----------------------
Route::get('/dashboard', [AdminDashboardController::class,'index'])
    ->middleware('auth')
    ->name('Admindashboard');

// -----------------------
// RESOURCE ROUTES
// -----------------------
Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('courses', CourseController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('exams', ExamController::class);
Route::resource('results', ResultController::class);
Route::resource('enrollments', EnrollmentController::class);

// -----------------------
// ADMIN CONTACT MESSAGES
// -----------------------
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/contactus', [ContactUsController::class, 'index'])->name('contactus.index');
    Route::get('/contactus/{id}/edit', [ContactUsController::class, 'edit'])->name('contactus.edit');
    Route::put('/contactus/{id}', [ContactUsController::class, 'update'])->name('contactus.update');
    Route::delete('/contactus/{id}', [ContactUsController::class, 'destroy'])->name('contactus.destroy');
});
