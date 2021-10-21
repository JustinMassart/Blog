<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
    public function create()
    {

        return view('sessions.create');

    }

    public function destroy()
    {
        $username = auth()->user()->username;
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye ' . $username);
    }

    public function store()
    {

        return 'You are logged in !';

    }
}
