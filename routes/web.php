<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MeetingsController;

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
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/{user}/profile-picture', [UserController::class, 'uploadProfilePicture'])->name('user.uploadProfilePicture');
    Route::post('/user/{user}/cv', [UserController::class, 'uploadCv'])->name('user.uploadCv');
    Route::post('/user/{user}/cover-letter', [UserController::class, 'uploadCoverLetter'])->name('user.uploadCoverLetter');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');

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
    Route::post('/leave/{leave}/approve', [LeaveController::class, 'approve'])->name('leave.approve');
    Route::post('/leave/{leave}/deny', [LeaveController::class, 'deny'])->name('leave.deny');
    Route::get('/leaves/outstanding', [LeaveController::class, 'outstandingRequests'])->name('leave.outstanding');

    Route::get('/api/meetings', [MeetingsController::class, 'getMeetings'])->name('meetings.get');
});