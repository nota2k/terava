<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('profiles', App\Http\Controllers\Api\ProfileController::class)->only('index');


Route::resource('profiles', App\Http\Controllers\Api\ProfileController::class)->except('create', 'edit');
Route::resource('profiles', App\Http\Controllers\Api\ProfileController::class)->except('create', 'edit');


Route::resource('users', App\Http\Controllers\Api\UserController::class)->except('create', 'edit');

Route::resource('profiles', App\Http\Controllers\Api\ProfileController::class)->except('create', 'edit');


Route::resource('users', App\Http\Controllers\Api\UserController::class)->except('create', 'edit');

Route::resource('profiles', App\Http\Controllers\Api\ProfileController::class)->except('create', 'edit');


Route::resource('users', App\Http\Controllers\Api\UserController::class)->except('create', 'edit');

Route::resource('profiles', App\Http\Controllers\Api\ProfileController::class)->except('create', 'edit');


Route::resource('users', App\Http\Controllers\Api\UserController::class)->except('create', 'edit');

Route::resource('profiles', App\Http\Controllers\Api\ProfileController::class)->except('create', 'edit');


Route::resource('users', App\Http\Controllers\Api\UserController::class)->except('create', 'edit');

Route::resource('profiles', App\Http\Controllers\Api\ProfileController::class)->except('create', 'edit');


Route::resource('users', App\Http\Controllers\Api\UserController::class)->except('create', 'edit');

Route::resource('profiles', App\Http\Controllers\Api\ProfileController::class)->except('create', 'edit');


Route::resource('users', App\Http\Controllers\Api\UserController::class)->except('create', 'edit');

Route::resource('profiles', App\Http\Controllers\Api\ProfileController::class)->except('create', 'edit');


Route::resource('users', App\Http\Controllers\Api\UserController::class)->except('create', 'edit');

Route::resource('profiles', App\Http\Controllers\Api\ProfileController::class)->except('create', 'edit');


Route::resource('users', App\Http\Controllers\Api\UserController::class)->except('create', 'edit');

Route::resource('profiles', App\Http\Controllers\Api\ProfileController::class)->except('create', 'edit');


Route::resource('users', App\Http\Controllers\Api\UserController::class)->except('create', 'edit');

Route::resource('profiles', App\Http\Controllers\Api\ProfileController::class)->except('create', 'edit');
