<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TripController;

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

Route::get('/trips', [TripController::class, 'index']);
Route::post('/trips', [TripController::class, 'store']);
Route::get('/trips/{id}', [TripController::class, 'show']);
Route::put('/trips/{id}', [TripController::class, 'update']);
Route::delete('/trips/{id}', [TripController::class, 'destroy']);
