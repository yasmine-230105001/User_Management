<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
 
Route::get('/', function () {
    return redirect()->route('users.index'); 
});

Route::resource('users', UserController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::put('/profile/update-email', [UserController::class, 'updateEmail'])->name('profile');
Route::put('/profile/update-password', [UserController::class, 'updatePassword'])->name('profile.update-password');
