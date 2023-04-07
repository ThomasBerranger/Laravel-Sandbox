<?php

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CharacterController;

/**
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/characters', function () {
    return Character::all();
});
Route::redirect('/characters/search', '/api/characters');
Route::get('/characters/search/{search}', [CharacterController::class, 'search'])->name('characters.search');
