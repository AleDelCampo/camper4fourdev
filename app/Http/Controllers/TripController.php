<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TripController extends Controller
{
    public function index()
    {
        // Recupera tutti i viaggi
        $trips = Trip::all();
        return view('trips.index', ['trips' => $trips]);
    }

    public function create()
    {
        return view('trips.create'); // Vista per il form di creazione
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $trip = Trip::create($data);
        return redirect()->route('trips.index')->with('success', 'Trip created successfully');
    }

    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        return view('trips.edit', compact('trip')); // Vista per il form di modifica
    }

    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $trip->update($data);
        return redirect()->route('trips.index')->with('success', 'Trip updated successfully');
    }

    public function destroy($id)
    {
        Trip::destroy($id);
        return redirect()->route('trips.index')->with('success', 'Trip deleted successfully');
    }
}
