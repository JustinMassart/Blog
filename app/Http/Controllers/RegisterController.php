<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function create()
    {

        return view('register.create');

    }

    public function store()
    {

        $validatedData = request()->validate([
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'name' => ['required', 'min:3'],
            'password' => ['required', 'min:3', 'max:32'],
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']); BCRYPT le password


        User::create($validatedData);

        /* Mass Assignement : gros array passer à la requête sans vérifier le contenu (Attaque possible, changement de la DB, ...)

            request()->all() A NE JAMAIS FAIRE

        */

        session()->flash('success', __('messages.account-created'));

        return redirect('/');

    }

}


/* RFC - Request For Comment, internet est basé là-dessus */
