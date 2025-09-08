<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', function () {
            return Inertia::render('admin/dashboard');
        })->name('dashboard');
        Route::get('/users', function () {
            return Inertia::render('admin/users');
        })->name('users');
        Route::get('/bookings', function () {
            return Inertia::render('admin/bookings');
        })->name('bookings');
    });
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', function () {
            return Inertia::render('user/dashboard');
        })->name('dashboard');
        Route::get('/pet-profile', function () {
            return Inertia::render('user/pet-profile');
        })->name('pet-profile');
        Route::get('/bookings', function () {
            return Inertia::render('user/bookings');
        })->name('bookings');
    });
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
