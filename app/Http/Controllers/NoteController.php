<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Stop;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return Note::all();
    }

    public function store(Request $request, $stopId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $stop = Stop::findOrFail($stopId);
        $note = $stop->notes()->create([
            'content' => $request->input('content'),
        ]);

        return response()->json($note, 201);
    }

    public function show($id)
    {
        return Note::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $note = Note::findOrFail($id);
        $note->update([
            'content' => $request->input('content'),
        ]);

        return response()->json($note);
    }

    public function destroy($noteId)
    {
        $note = Note::find($noteId);

        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        $note->delete();

        return response()->json(['message' => 'Note deleted successfully']);
    }
}
