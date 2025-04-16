<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();

        return response()->json($profiles);
    }

    public function show($id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        return response()->json($profile);
    }
    public function store(Request $request)
    {
        $profile = Profile::create($request->all());

        return response()->json($profile, 201);
    }
    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        $profile->update($request->all());

        return response()->json($profile);
    }
    public function destroy($id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        $profile->delete();

        return response()->json(['message' => 'Profile deleted']);
    }
}
