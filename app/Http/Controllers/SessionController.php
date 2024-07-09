<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Controller as BaseController;

class SessionController extends BaseController
{
    public function create()
    {
        return view('sessions.login');
    }

    public function store()
    {
        $attributes = request()->validate([
           'email' => 'required',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided email could not be verified'
            ]);
        }
        return redirect('/')->with('success', 'Welcome back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
