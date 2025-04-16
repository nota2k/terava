<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    public function index(Request $request): Response
    {
        $profiles = Profile::all();

        return $profiles;
    }

    public function show(Request $request, Profile $profile): Response
    {
        $profiles = Profile::find(id)->get();

        return $profiles;
    }

    public function store(Request $request): Response
    {
        $profile = Profile::create($request->all());

        return $profile;
    }

    public function update(Request $request, Profile $profile): Response
    {
        $profiles = Profile::find(id)->get();

        $profile->update([]);

        return $profile;
    }

    public function destroy(Request $request, Profile $profile): Response
    {
        $profiles = Profile::find(id)->get();

        $profile->delete();

        return response()->noContent();
    }
}
