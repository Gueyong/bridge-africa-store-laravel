<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Apply web middleware to all routes
Route::middleware(['web'])->group(function () {
    // Root route
    Route::get('/', function () {
        return redirect('/login');
    });


Route::middleware(['web'])->group(function () {
    // Your routes here
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
});

    // Auth routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
        Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
        
        // Logout route
        Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

        // Products resource routes
        Route::resource('products', ProductController::class);
    });
});

// Include auth routes
require __DIR__.'/auth.php';