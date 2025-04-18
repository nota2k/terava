<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use OpenApi\Attributes as OA;

class ProfileController extends Controller
{
    // public function index()
    // {
    //     $profiles = Profile::with('user')->get();

    //     return response()->json($profiles);
    // }

    public function show($id)
    {
        $user = User::find($id);
        // Récupérer le profil de l'utilisateur
        $profile = $user->profile;
        if (!$profile) {
            return response()->json(['message' => 'Profil non trouvé'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($profile);
    }

    public function store(Request $request)
    {
        $profile = Profile::create($request->all());

        return response()->json($profile);
    }

    public function update($id, Profile $profile)
    {
        $profile = Profile::find($id)->get();

        $profile->update([]);

        return response()->json($profile);
    }

    public function destroy($id, Profile $profile)
    {
        $profile = Profile::find($id)->get();

        $profile->delete();

        return response()->noContent();
    }
}
