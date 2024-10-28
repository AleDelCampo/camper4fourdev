<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function create()
    {
        return view('trips.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Trip::create([
            'name' => $request->name,
            'date' => $request->date,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('welcome');
    }

    public function index()
    {
        $trips = Trip::all();
        return response()->json($trips);
    }
}