<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\MeetingsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
