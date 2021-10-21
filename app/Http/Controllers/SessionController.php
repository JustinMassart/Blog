<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter\AlignFormatter;

class SessionController extends Controller
{
    public function create()
    {

        return view('sessions.create');

    }

    public function destroy()
    {
        $username = auth()->user()->name;

        auth()->logout();

        return redirect('/')->with('success', 'Goodbye ' . $username);
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!auth()->attempt($attributes)) {

            throw ValidationException::withMessages(['email' => 'Your provided credentials didn’t match our records']);

        }

        // user is logged in

        session()->regenerate();

        $username = auth()->user()->name;

        return redirect('/')->with('success', 'Welcome back ' . $username . ', you are now logged in !');


    }
}
