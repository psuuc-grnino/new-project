<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeedbackController;


Route::get('/login', action: [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', action: [LoginController::class, 'login']);
Route::post('/logout', action: [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/dashboard', [DashboardController::class, 'show'])->middleware('auth')->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::post('/admin/course', [AdminController::class, 'addCourse']);

    Route::post('/course/enroll', [CourseController::class, 'enroll']);

    Route::post('/feedback', [FeedbackController::class, 'store']);
});

