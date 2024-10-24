<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\MeetingsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/locale', LocaleController::class)->middleware('auth:sanctum')->name('locale.change');

Route::get('/api/holidays', [LeaveController::class, 'getHolidays'])->middleware('auth:sanctum');
Route::get('/api/leaves', [LeaveController::class, 'getLeaves'])->middleware('auth:sanctum');

Route::get('/api/meetings', [MeetingsController::class, 'getMeetings'])->middleware('auth:sanctum')->name('meetings.get');