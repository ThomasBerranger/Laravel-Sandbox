<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Character;

class CharacterController extends Controller
{
    /**
     * Search example : character name "manga name"
     *
     * @param string|null $search
     * @return mixed
     */
    public function search(string $search = null)
    {
        return Character::query()
            ->search($search)
            ->with('manga')
            ->paginate();
    }
}
