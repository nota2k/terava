<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\UserController;

Route::apiResource('users', App\Http\Controllers\Api\UserController::class);
Route::get('/users/{id}/profil', [UserController::class, 'getUserProfile']);
Route::put('/users/{id}/profil', [UserController::class, 'updateUserProfile']);
// Route::get('/api/users/{id}/profile', [UserController::class, 'getUserProfile']);
// Route::get('/users', [UserController::class, 'index']);
// Route::get('/users/{id}', [UserController::class, 'show']);
// Route::post('/users/add', [UserController::class, 'store']);
// Route::put('/users/{id}', [UserController::class, 'update']);
// Route::delete('/users/{id}', [UserController::class, 'destroy']);

// Route::get('/profiles', [ProfileController::class, 'index']);
// Route::get('/profiles/{id}', [ProfileController::class, 'show']);
// Route::post('/profiles', [ProfileController::class, 'store']);
// Route::put('/profiles/{id}', [ProfileController::class, 'update']);
// Route::delete('/profiles/{id}', [ProfileController::class, 'destroy']);
