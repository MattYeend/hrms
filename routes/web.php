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

Route::post('/locale', LocaleController::class)->name('locale.change');

Route::middleware(['auth'])->group(function(){
    Route::get('/show/{id}', [UserController::class, 'show'])->name('profile');
    Route::get('/get-dark-mode-preference', [UserController::class, 'getDarkModePreference'])->name('get-dark-mode-preference');
    Route::post('/toggle-dark-mode', [UserController::class, 'toggleDarkMode'])->name('toggle-dark-mode');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/super-admin-home', [HomeController::class, 'superAdminHome'])->name('super-admin-home');
    Route::get('/admin-home', [HomeController::class, 'adminHome'])->name('admin-home');

    Route::get('/calendar', [LeaveController::class, 'index'])->name('calendar');
    Route::get('/api/holidays', [LeaveController::class, 'getHolidays']);
    Route::get('/api/leaves', [LeaveController::class, 'getLeaves']);
    Route::get('/leaves/create', [LeaveController::class, 'create'])->name('leave.create');
    Route::post('/leaves', [LeaveController::class, 'store'])->name('leave.store');
    Route::get('/leave/{leave}', [LeaveController::class, 'show'])->name('leave.show');
    Route::get('/leave/{leave}/edit', [LeaveController::class, 'edit'])->name('leave.edit');
    Route::put('/leave/{leave}', [LeaveController::class, 'update'])->name('leave.update');
    Route::delete('/leave/{leave}', [LeaveController::class, 'delete'])->name('leave.delete');
    Route::post('/leave/{leave}/approve', [LeaveController::class, 'approve'])->name('leave.approve')->middleware('can:approve, leave');
    Route::post('/leave/{leave}/deny', [LeaveController::class, 'deny'])->name('leave.deny')->middleware('can:deny, leave');
    Route::get('/leaves/outstanding', [LeaveController::class, 'outstandingRequests'])->name('leave.outstanding');
});