<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\StopController;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Rotte per Days
Route::get('/days/create', [DayController::class, 'create'])->name('days.create');
Route::post('/days', [DayController::class, 'store'])->name('days.store');
Route::get('/days', [DayController::class, 'showDaysPage'])->name('days.index');

// Rotte per Stops
Route::get('/stops/create', [StopController::class, 'create'])->name('stops.create');
Route::post('/stops', [StopController::class, 'store'])->name('stops.store');
Route::get('/stops', [StopController::class, 'showStopsPage'])->name('stops.index');

// Rotte per Trips
Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
Route::get('/trips/create', [TripController::class, 'create'])->name('trips.create');
Route::post('/trips', [TripController::class, 'store'])->name('trips.store');
Route::get('/trips/{id}', [TripController::class, 'show'])->name('trips.show');
Route::get('/trips/{id}/edit', [TripController::class, 'edit'])->name('trips.edit');
Route::put('/trips/{id}', [TripController::class, 'update'])->name('trips.update');
Route::delete('/trips/{id}', [TripController::class, 'destroy'])->name('trips.destroy');
