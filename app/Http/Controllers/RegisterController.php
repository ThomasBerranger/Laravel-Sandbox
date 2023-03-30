<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('register.create');
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'max:255', 'min:3', Rule::unique('users', 'email')],
            'password' => ['required', 'max:255', 'min:3'],
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect()->route('home')->with('success', 'Your account has been created.');
    }
}
