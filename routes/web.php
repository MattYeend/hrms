<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('welcome');
});

Auth::routes();

Route::get('/show/{id}', [UserController::class, 'show'])->name('profile');
Route::get('/get-dark-mode-preference', [UserController::class, 'getDarkModePreference'])->name('get-dark-mode-preference');
Route::post('/toggle-dark-mode', [UserController::class, 'toggleDarkMode'])->name('toggle-dark-mode');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/super-admin-home', [HomeController::class, 'superAdminHome'])->name('super-admin-home');
Route::get('/admin-home', [HomeController::class, 'adminHome'])->name('admin-home');

Route::post('/locale', LocaleController::class)->name('locale.change');

Route::get('/calendar', [LeaveController::class, 'index'])->name('calendar');