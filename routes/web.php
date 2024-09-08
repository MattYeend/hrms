<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LocaleController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return redirect('/login');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/super-admin-home', [App\Http\Controllers\HomeController::class, 'superAdminHome'])->name('super-admin-home');
Route::get('/admin-home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin-home');

Route::post('/locale', LocaleController::class)->name('locale.change');