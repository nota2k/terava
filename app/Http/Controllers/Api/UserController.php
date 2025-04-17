<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        foreach($users as $user) {
            // eager load the profile relationship
            $user->profile = User::with('profile')->find($user->id)->profile;
        }

        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);
        // eager load the profile relationship
        $profile = User::with('profile')->find($user->id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($profile);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user);
    }

    public function update(User $user,$id)
    {
        $user = User::with('profile')->findOrFail($id);

        $user->update([]);

        return response()->json($user);
    }

    public function destroy($id, User $user): Response
    {
        $user = User::with('profile')->findOrFail($id);

        $user->delete();

        return response()->noContent();
    }
}
