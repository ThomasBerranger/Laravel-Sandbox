<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MangaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);

        $manga = new Manga([
            'name' => request('name'),
            'category_id' => request('category_id')
        ]);

        $manga->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manga $manga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manga $manga): RedirectResponse
    {
        $manga->delete();

        return to_route('home');
    }
}
