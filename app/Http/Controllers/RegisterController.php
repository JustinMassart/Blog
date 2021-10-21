<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        auth()->login($user);  // Log the user

        return redirect('/')->with('success', __('messages.account-created'));
    }
}
