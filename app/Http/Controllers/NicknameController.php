<?php

namespace App\Http\Controllers;

use App\Models\Nickname;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NicknameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('nicknames')
        ->latest()
        ->take(50)
        ->get();

        return view('home', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user) :JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);


        $nickname = $user->nicknames()->create([
            'name' => $validated['name'],
        ]);

        return response()->json([
            'message' => 'Nickname added successfully!',
            'user_id' => $user->id,
            'name' => $nickname -> name],
             201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
