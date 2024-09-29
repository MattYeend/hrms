<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LocaleController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('welcome');
});

Auth::routes();

Route::get('/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('profile');
Route::get('/get-dark-mode-preference', [App\Http\Controllers\UserController::class, 'getDarkModePreference'])->name('get-dark-mode-preference');
Route::post('/toggle-dark-mode', [App\Http\Controllers\UserController::class, 'toggleDarkMode'])->name('toggle-dark-mode');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/super-admin-home', [App\Http\Controllers\HomeController::class, 'superAdminHome'])->name('super-admin-home');
Route::get('/admin-home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin-home');

Route::post('/locale', LocaleController::class)->name('locale.change');

Route::get('/calendar', [App\Http\Controllers\LeaveController::class, 'index'])->name('calendar');