<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfileController;

Route::get('/profiles', [ProfileController::class, 'index']);
Route::get('/profiles/{id}', [ProfileController::class, 'show']);
Route::post('/profiles', [ProfileController::class, 'store']);
Route::put('/profiles/{id}', [ProfileController::class, 'update']);
Route::delete('/profiles/{id}', [ProfileController::class, 'destroy']);
