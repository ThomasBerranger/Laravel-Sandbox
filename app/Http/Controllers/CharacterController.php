<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Models\Category;
use App\Models\Character;
use App\Models\Manga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('home', [
            'characters' => Character::all(),
            'mangas' => Manga::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character): View
    {
        return view('characters.detail', [
            'character' => $character,
            'mangas' => Manga::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCharacterRequest $request): RedirectResponse
    {
        $path = $request->file('picture')->store('characters');

        $character = new Character([
            'name' => $request->get('name'),
            'super_power' => $request->get('super_power') ?? false,
            'manga_id' => $request->get('manga_id'),
            'picture' => $path
        ]);

        $character->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCharacterRequest $request)
    {
        $attributes = $request->all();
        $attributes['super_power'] ??= false;

        $character = Character::findOrFail($attributes['id']);

        if (isset($attributes['picture'])) {
            if ($character->picture && Storage::disk('public')->exists($character->picture)) {
                Storage::disk('public')->delete($character->picture);
            }

            $attributes['picture'] = request()->file('picture')->store('characters');
        }

        $character->update($attributes);

        return redirect()->route('characters.detail', $character)->with('success', $character->name . '\'s profile updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character): RedirectResponse
    {
        if ($character->picture) {
            Storage::disk('public')->delete($character->picture);
        }

        $character->delete();

        return redirect()->route('home');
    }
}
