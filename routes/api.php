<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NicknameController;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'getUsers']);

Route::get('/users-with-nicknames', [UserController::class, 'getUsersWithNicknames']);

Route::post('/users/{user}/nicknames', [NicknameController::class, 'store']);