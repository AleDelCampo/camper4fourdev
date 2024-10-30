<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\StopController;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::resource('stops.notes', NoteController::class);
Route::resource('stops', StopController::class);
Route::resource('days', DayController::class);
Route::get('/trips/create', [TripController::class, 'create'])->name('trips.create');
Route::post('/trips', [TripController::class, 'store'])->name('trips.store');
Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
