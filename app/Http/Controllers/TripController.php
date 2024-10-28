<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TripController extends Controller
{
    public function create()
    {
        return view('trips.create');
    }

    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'image' => 'required|image|max:2048',
        ]);

        // Salva l'immagine nella cartella pubblica e ottieni il percorso
        $imagePath = $request->file('image')->store('images', 'public');

        // Crea il trip nel database
        Trip::create([
            'name' => $request->name,
            'date' => $request->date,
            'image_path' => $imagePath,
        ]);

        // Reindirizza alla rotta welcome o altra pagina desiderata
        return redirect()->route('welcome');
    }

    public function index()
    {
        // Recupera tutti i trips e genera URL completi per le immagini
        $trips = Trip::all()->map(function ($trip) {
            $trip->image_path = Storage::url($trip->image_path);
            return $trip;
        });

        // Ritorna i trips come risposta JSON
        return response()->json($trips);
    }
}
