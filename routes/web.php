<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LocaleController;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/locale', LocaleController::class)->name('locale.change');