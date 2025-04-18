<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\TripController;
use App\Http\Controllers\Api\UserController;

Route::apiResource('users', App\Http\Controllers\Api\UserController::class);
Route::get('/users/{id}/profil', [UserController::class, 'getUserProfile']);
Route::put('/users/{id}/profil', [UserController::class, 'updateUserProfile']);

Route::apiResource('trips', App\Http\Controllers\Api\TripController::class);
