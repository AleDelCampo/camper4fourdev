<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trip; // Assicurati di importare il modello Trip
use Illuminate\Http\Request;

class TripController extends Controller
{
    // Restituisce tutti i viaggi
    public function index()
    {
        return Trip::all(); // Restituisce tutti i record
    }

    // Crea un nuovo viaggio
    public function store(Request $request)
    {
        $trip = Trip::create($request->all()); // Crea e restituisce il viaggio creato
        return response()->json($trip, 201);
    }

    // Mostra un viaggio specifico
    public function show($id)
    {
        return Trip::findOrFail($id); // Restituisce il viaggio specificato
    }

    // Aggiorna un viaggio esistente
    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);
        $trip->update($request->all());
        return response()->json($trip, 200);
    }

    // Elimina un viaggio
    public function destroy($id)
    {
        Trip::destroy($id);
        return response()->json(null, 204); // Restituisce un codice di stato 204
    }
}
