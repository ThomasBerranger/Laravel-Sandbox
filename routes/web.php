<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Manga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::controller(CharacterController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/characters/{character}', 'show')->name('characters.detail');
    Route::post('/characters', 'store')->name('characters.store');
    Route::patch('/characters/{character}', 'update')->name('characters.update')->middleware('auth');
    Route::delete('/characters/{character}', 'destroy')->name('characters.delete');
});

Route::controller(MangaController::class)->group(function () {
    Route::get('/mangas/{manga}', function (Manga $manga) {
        return view('mangas.detail', [
            'manga' => $manga,
            'relatedCharactersNumber' => $manga->relatedCharactersNumber()
        ]);
    })->name('mangas.detail');
    Route::post('/mangas', 'store')->name('mangas.create');
    Route::delete('/mangas/{manga}', 'destroy')->name('mangas.delete');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'create')->name('register.create')->middleware('guest');
    Route::post('/register', 'store')->name('register.store')->middleware('guest');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('account', 'show')->name('account')->middleware('auth');
    Route::get('login', 'create')->name('login')->middleware('guest');
    Route::post('login', 'store')->name('login')->middleware('guest');
    Route::post('logout', 'destroy')->name('logout')->middleware('auth');
});

Route::post('/tokens/create', function (Request $request) {
    $request->validate([
        'token_name' => 'required'
    ]);

    auth()->user()->tokens()->delete();

    $token = $request->user()->createToken($request->token_name, ['character:read', 'character:write']);

    return to_route('account')->with('plainTextToken', $token->plainTextToken);
})->name('tokens.create')->middleware('auth');
