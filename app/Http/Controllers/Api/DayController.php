<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index()
    {
        return response()->json(Day::all());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'date' => 'required|date',
        ]);

        $day = Day::create($validatedData);
        return response()->json($day, 201);
    }

    public function show($id)
    {
        $day = Day::findOrFail($id);
        return response()->json($day);
    }

    public function update(Request $request, $id)
    {
        $day = Day::findOrFail($id);
        $validatedData = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'date' => 'required|date',
        ]);

        $day->update($validatedData);
        return response()->json($day);
    }

    public function destroy($id)
    {
        Day::destroy($id);
        return response()->json(null, 204);
    }
}
