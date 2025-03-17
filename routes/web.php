<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GradeController;

// Redirect root URL to dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Authentication routes
Auth::routes();

// Protected routes (Requires authentication)
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/update-email', [UserController::class, 'updateEmail'])->name('profile.updateEmail');
    Route::put('/profile/update-password', [UserController::class, 'updatePassword'])->name('profile.updatePassword');

    // User Management
    Route::resource('users', UserController::class);
    Route::put('/users/{user}/change-password', [UserController::class, 'changePassword'])
    ->name('users.changePassword'); // ✅ Ensure the name matches exactly

    Route::resource('grades', GradeController::class);
    
});
