<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Trip;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index()
    {
        return view('days.index', ['days' => Day::all()]);
    }

    public function create()
    {
        $trips = Trip::all();
        return view('days.create', compact('trips'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'date' => 'required|date',
        ]);

        Day::create($validatedData);
        return redirect()->route('days.index')->with('success', 'Day created successfully');
    }

    public function show($id)
    {
        $day = Day::findOrFail($id);
        return view('days.show', compact('day'));
    }

}
