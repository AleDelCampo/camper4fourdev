<?php

namespace App\Http\Controllers;

use App\Models\Stop;
use App\Models\Day;
use Illuminate\Http\Request;

class StopController extends Controller
{
    public function index()
    {
        $stops = Stop::with('images', 'rating')->get();
        return view('stops.index', ['stops' => $stops]);
    }

    public function create()
    {
        $days = Day::all(); // Per il dropdown dei giorni
        return view('stops.create', compact('days'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'day_id' => 'required|exists:days,id',
            'location' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        // Crea la Stop usando i dati validati senza gestione immagini
        $stop = Stop::create($validatedData);

        return redirect()->route('stops.index')->with('success', 'Stop created successfully');
    }


    public function show($id)
    {
        $stop = Stop::with( 'rating')->find($id);

        if (!$stop) {
            return redirect()->route('stops.index')->with('error', 'Stop not found');
        }

        return view('stops.show', compact('stop'));
    }

    public function edit($id)
    {
        $stop = Stop::find($id);
        $days = Day::all();

        if (!$stop) {
            return redirect()->route('stops.index')->with('error', 'Stop not found');
        }

        return view('stops.edit', compact('stop', 'days'));
    }

    public function update(Request $request, $id)
    {
        $stop = Stop::find($id);

        if (!$stop) {
            return redirect()->route('stops.index')->with('error', 'Stop not found');
        }

        $validatedData = $request->validate([
            'day_id' => 'required|exists:days,id',
            'location' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $stop->update($validatedData);

        return redirect()->route('stops.index')->with('success', 'Stop updated successfully');
    }

    public function destroy($id)
    {
        $stop = Stop::find($id);

        if (!$stop) {
            return redirect()->route('stops.index')->with('error', 'Stop not found');
        }

        $stop->images()->delete();
        $stop->rating()->delete();
        $stop->delete();

        return redirect()->route('stops.index')->with('success', 'Stop deleted successfully');
    }
}
