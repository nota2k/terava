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
        tags: ['Voyages'],
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

    public function show($id)
    {
        $trip = Trip::find($id)->get();

        return response()->json($trip);
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
