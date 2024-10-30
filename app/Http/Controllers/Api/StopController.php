<?php

namespace App\Http\Controllers\Api;

use App\Models\Stop;
use App\Models\Day;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StopController extends Controller
{
    public function index()
    {
        return response()->json(Stop::with('images', 'rating')->get());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'day_id' => 'required|exists:days,id',
            'location' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|max:2048',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $stop = Stop::create($validatedData);

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $stop->images()->create(['path' => $path]);
            }
        }

        if ($request->has('rating')) {
            $stop->rating()->create(['rating' => $request->rating]);
        }

        return response()->json($stop, 201);
    }

    public function show($id)
    {
        $stop = Stop::with('images', 'rating')->find($id);

        if (!$stop) {
            return response()->json(['error' => 'Stop not found'], 404);
        }

        return response()->json($stop);
    }

    public function update(Request $request, $id)
    {
        $stop = Stop::find($id);

        if (!$stop) {
            return response()->json(['error' => 'Stop not found'], 404);
        }

        $validatedData = $request->validate([
            'day_id' => 'required|exists:days,id',
            'location' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|max:2048',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $stop->update($validatedData);

        if ($request->has('images')) {
            $stop->images()->delete();

            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $stop->images()->create(['path' => $path]);
            }
        }

        if ($request->has('rating')) {
            $stop->rating()->updateOrCreate([], ['rating' => $request->rating]);
        }

        return response()->json($stop, 200);
    }

    public function destroy($id)
    {
        $stop = Stop::find($id);

        if (!$stop) {
            return response()->json(['error' => 'Stop not found'], 404);
        }

        $stop->images()->delete();
        $stop->rating()->delete();
        $stop->delete();

        return response()->json(null, 204);
    }

    public function rate(Request $request, $id)
    {
        $stop = Stop::findOrFail($id);

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $stop->rating()->updateOrCreate([], ['rating' => $request->rating]);

        return response()->json(['success' => true, 'rating' => $stop->rating->rating]);
    }

    public function addNote(Request $request, $stopId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $note = new Note();
        $note->content = $request->input('content');
        $note->stop_id = $stopId;
        $note->save();

        return response()->json($note, 201);
    }
}
