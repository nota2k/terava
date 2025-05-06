<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use OpenApi\Attributes as OA;

class TripController extends Controller
{
    #[OA\Get(
        path: '/api/trips',
        summary: 'Liste tous les voyages',
        tags: ['Trip'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Succès'
            )
        ]
    )]
    public function index()
    {
        $trips = Trip::all();

        return response()->json($trips);
    }

    #[OA\Get(
        path: '/api/trips/{id}',
        summary: 'Récupérer un voyage par ID',
        tags: ['Trip'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                description: 'ID du voyage',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer')
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Succès',
                content: new OA\JsonContent(ref: '#/components/schemas/Trip')
            ),
            new OA\Response(
                response: 404,
                description: 'Voyage non trouvé'
            )
        ]
    )]

    public function show($id)
    {
        $trip = Trip::findOrFail($id);

        return response()->json($trip);
    }

    #[OA\Get(
        path: '/api/trips/search',
        tags: ['Trip'],
        summary: 'Trouver un voyage par recherche',
        description: 'Muliple tags can be provided with comma separated strings. Use tag1, tag2, tag3 for testing.',
        operationId: 'filterTripsbyTags',
        parameters: [
            new OA\Parameter(
            name: 'country',
            description: 'Filtrer par pays',
            in: 'query',
            required: false,
            schema: new OA\Schema(type: 'string')
            ),
            new OA\Parameter(
            name: 'title',
            description: 'Filtrer par titre',
            in: 'query',
            required: false,
            schema: new OA\Schema(type: 'string')
            ),
            new OA\Parameter(
            name: 'description',
            description: 'Filtrer par description',
            in: 'query',
            required: false,
            schema: new OA\Schema(type: 'string')
            ),
            new OA\Parameter(
            name: 'city',
            description: 'Filtrer par ville',
            in: 'query',
            required: false,
            schema: new OA\Schema(type: 'string')
            ),
            new OA\Parameter(
            name: 'start_date',
            description: 'Filtrer par date de début',
            in: 'query',
            required: false,
            schema: new OA\Schema(type: 'string', format: 'date')
            ),
            new OA\Parameter(
            name: 'end_date',
            description: 'Filtrer par date de fin',
            in: 'query',
            required: false,
            schema: new OA\Schema(type: 'string', format: 'date')
            ),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Liste des voyages',
                content: new OA\JsonContent(
                    type: 'array',
                    items: new OA\Items(ref: '#/components/schemas/Trip')
                )
            )
        ]
    )]

    public function filterTripsbyTags(Request $request)
    {
        $query = Trip::query();

        if ($request->has('country')) {
            $query->where('country', 'like', '%' . $request->input('country') . '%');
        }

        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        if ($request->has('description')) {
            $query->where('description', 'like', '%' . $request->input('description') . '%');
        }

        if ($request->has('city')) {
            $query->where('city', 'like', '%' . $request->input('city') . '%');
        }

        if ($request->has('start_date')) {
            $query->whereDate('start_date', '>=', $request->input('start_date'));
        }

        if ($request->has('end_date')) {
            $query->whereDate('end_date', '<=', $request->input('end_date'));
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $trip = Trip::create($request->all());

        return response()->json($trip);
    }

    public function update($id, Trip $trip)
    {
        $trip = Trip::find($id)->get();

        $trip->update([]);

        return response()->json($trip);
    }

    public function destroy($id, Trip $trip)
    {
        $trip = Trip::find($id)->get();

        $trip->delete();

        return response()->noContent();
    }
}
