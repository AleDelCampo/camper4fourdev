<?php

namespace App\Http\Controllers\Api;

use App\Models\Note;
use App\Models\Stop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    public function index()
    {
        return response()->json(Note::all(), 200);
    }

    public function store(Request $request, $stopId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $stop = Stop::findOrFail($stopId);
        $note = $stop->notes()->create(['content' => $request->input('content')]);

        return response()->json($note, 201);
    }

    public function show($id)
    {
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        return response()->json($note, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $note = Note::findOrFail($id);
        $note->update(['content' => $request->input('content')]);

        return response()->json($note, 200);
    }

    public function destroy($id)
    {
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        $note->delete();

        return response()->json(['message' => 'Note deleted successfully'], 200);
    }
}
