<?php

use App\Http\Controllers\API\RickAndMortyController;
use Illuminate\Support\Facades\Route;

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

Route::get('/character', [RickAndMortyController::class, 'index']);
Route::get('/character/{characterId}', [RickAndMortyController::class, 'show']);
