<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TripController;
use App\Http\Controllers\Api\DayController;
use App\Http\Controllers\StopController;
use App\Http\Controllers\NoteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('trips.days', DayController::class);
Route::apiResource('days.stops', StopController::class);

Route::post('/stops/{id}/rate', [StopController::class, 'rate']);
Route::post('/stops/{stop}/notes', [NoteController::class, 'store']);
Route::delete('/notes/{noteId}', [NoteController::class, 'destroy']);

Route::apiResource('stops', StopController::class);
Route::post('stops/{id}/rate', [StopController::class, 'rate']);
Route::post('stops/{stopId}/notes', [StopController::class, 'addNote']);

Route::apiResource('days', DayController::class);
Route::get('/trips', [TripController::class, 'index']);
Route::post('/trips', [TripController::class, 'store']);
Route::get('/trips/{id}', [TripController::class, 'show']);
Route::put('/trips/{id}', [TripController::class, 'update']);
Route::delete('/trips/{id}', [TripController::class, 'destroy']);
