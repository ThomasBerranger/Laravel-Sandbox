<?php

use App\Http\Controllers\API\CharacterController;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/auth-check', function (Request $request) {
    return 'auth:sanctum working';
});

Route::redirect('/characters/search', '/api/characters');
Route::get('/characters/search/{search}', [CharacterController::class, 'search'])->name('characters.search');

Route::get('/characters', function () {
    return Character::all();
})->middleware(['auth:sanctum', 'ability:character:read']);

Route::patch('/characters/{character}', function (Character $character) {
    return $character->name . ' edited !';
})->middleware(['auth:sanctum', 'ability:character:write']);
