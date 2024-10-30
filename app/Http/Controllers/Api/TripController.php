<?php

namespace App\Http\Controllers\Api;

use App\Models\Trip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TripController extends Controller
{
    public function index()
    {
        // Carica tutti i viaggi con le giornate e le tappe correlate
        return response()->json(Trip::with('days.stops')->get(), 200);
    }

    public function show($id)
    {
        // Carica il viaggio insieme alle giornate e alle fermate
        $trip = Trip::with('days.stops')->find($id);

        if (!$trip) {
            return response()->json(['error' => 'Trip not found'], 404);
        }

        return response()->json($trip, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $trip = Trip::create($data);
        return response()->json(['trip' => $trip], 201);
    }

    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $trip->update($data);
        return response()->json(['trip' => $trip], 200);
    }

    public function destroy($id)
    {
        Trip::destroy($id);
        return response()->json(['message' => 'Trip deleted successfully'], 200);
    }

    public function getTripDetails($tripId)
    {
        $trip = Trip::with(['days.stops.notes'])->find($tripId);
        if (!$trip) {
            return response()->json(['error' => 'Trip not found'], 404);
        }
        return response()->json($trip, 200);
    }
}
