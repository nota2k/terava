<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfileController;


Route::get('/users', [ProfileController::class, 'index']);
Route::get('/users/{id}', [ProfileController::class, 'show']);
Route::post('/user/add', [ProfileController::class, 'store']);
Route::put('/users/{id}', [ProfileController::class, 'update']);
Route::delete('/users/{id}', [ProfileController::class, 'destroy']);

Route::get('/profiles', [ProfileController::class, 'index']);
Route::get('/profiles/{id}', [ProfileController::class, 'show']);
Route::post('/profiles', [ProfileController::class, 'store']);
Route::put('/profiles/{id}', [ProfileController::class, 'update']);
Route::delete('/profiles/{id}', [ProfileController::class, 'destroy']);
