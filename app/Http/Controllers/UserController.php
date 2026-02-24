<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    public function getUsersWithNicknames(): JsonResponse{
        $users = User::with('nicknames')->get();

        return response()->json($users);
    }

    public function getUsers(): JsonResponse{
        $users = User::all();

        return response()->json($users);
    }
}
