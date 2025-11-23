<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboardcontroller;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){ return redirect()->route('dashboard'); });
Route::get('/dashboard', function(){ return view('dashboard'); })->name('dashboard')->middleware('auth');
Route::get('/students', function(){ return view('students'); })->name('students')->middleware('auth');
Route::get('/login', [AuthController::class, 'showLoginForm']) ->name('Login'); 
Route::post('/login', [AuthController::class, 'Submitlogin']) ->name('login.submit');
Route::get('/dashboard', [Dashboardcontroller::class,'index'])->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', function(){ return redirect()->route('dashboard'); });
Route::get('/dashboard', function(){ return view('dashboard'); })->name('dashboard')->middleware('auth');
Route::get('/students', function(){ return view('students'); })->name('students')->middleware('auth');
