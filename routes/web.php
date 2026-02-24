<?php

use App\Http\Controllers\NicknameController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NicknameController::class, 'index']);
