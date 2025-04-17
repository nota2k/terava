<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use OpenApi\Attributes as OA;

#[OA\Info(
    version: '1.0.0',
    title: 'Mon API Laravel'
)]
class UserController extends Controller
{
    #[OA\Get(
        path: '/api/users',
        summary: 'Liste tous les utilisateurs',
        tags: ['Users'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Succès'
            )
        ]
    )]
    public function index()
    {
        $users = User::all();
        foreach ($users as $user) {
            // eager load the profile relationship
            $user->profile = User::with('profile')->find($user->id)->profile;
        }
        return response()->json($users);
    }

    #[OA\Get(
        path: '/api/users/{id}',
        summary: 'Récupérer un utilisateur par ID',
        tags: ['Users'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                description: 'ID de l\'utilisateur',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer')
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Succès',
                content: new OA\JsonContent(ref: '#/components/schemas/User')
            ),
            new OA\Response(
                response: 404,
                description: 'Utilisateur non trouvé'
            )
        ]
    )]
    public function show($id)
    {
        $user = User::with('profile')->find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    #[OA\Post(
        path: '/api/users',
        tags: ['Users'],
        summary: 'Créer un nouvel utilisateur',
        operationId: 'store',
        requestBody: new OA\RequestBody(
            description: 'Objet utilisateur à créer',
            required: true,
            content: new OA\JsonContent(
                ref: User::class
            )
        ),
        responses: [
            new OA\Response(
                response: 201,
                description: 'Utilisateur créé avec succès',
                content: new OA\JsonContent(
                    ref: User::class
                )
            )
        ]
    )]
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    #[OA\Put(
        path: '/api/users/{id}',
        tags: ['Users'],
        summary: 'Mettre à jour un utilisateur',
        parameters: [
            new OA\Parameter(
                name: 'id',
                description: 'ID de l\'utilisateur',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer')
            )
        ],
        requestBody: new OA\RequestBody(
            description: 'Données utilisateur à mettre à jour',
            required: true,
            content: new OA\JsonContent(
                ref: User::class
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'Utilisateur mis à jour avec succès',
                content: new OA\JsonContent(
                    ref: User::class
                )
            ),
            new OA\Response(
                response: 404,
                description: 'Utilisateur non trouvé'
            )
        ]
    )]
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->update($request->all());
        return response()->json($user);
    }

    #[OA\Delete(
        path: '/api/users/{id}',
        tags: ['Users'],
        summary: 'Supprimer un utilisateur',
        parameters: [
            new OA\Parameter(
                name: 'id',
                description: 'ID de l\'utilisateur',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer')
            )
        ],
        responses: [
            new OA\Response(
                response: 204,
                description: 'Utilisateur supprimé avec succès'
            ),
            new OA\Response(
                response: 404,
                description: 'Utilisateur non trouvé'
            )
        ]
    )]
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
}
