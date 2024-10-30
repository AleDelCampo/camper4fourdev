<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Stop;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        // Carica tutte le note per visualizzarle in una vista
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    public function create($stopId)
    {
        // Mostra il form di creazione per aggiungere una nota a una tappa specifica
        $stop = Stop::findOrFail($stopId);
        return view('notes.create', compact('stop'));
    }

    public function store(Request $request, $stopId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $stop = Stop::findOrFail($stopId);
        $stop->notes()->create(['content' => $request->input('content')]);

        return redirect()->route('stops.show', $stopId)->with('success', 'Note created successfully');
    }

    public function show($id)
    {
        // Visualizza una singola nota
        $note = Note::findOrFail($id);
        return view('notes.show', compact('note'));
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $note = Note::findOrFail($id);
        $note->update(['content' => $request->input('content')]);

        return redirect()->route('notes.show', $note->id)->with('success', 'Note updated successfully');
    }

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully');
    }
}
