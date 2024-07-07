<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class RegisterController extends BaseController
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
           'username' => 'required|max:255|min:3|unique:users,username',
           'email' => 'required|email|max:255|unique:users,email',
           'password' => 'required|min:7|max:255'
        ]);

        // Hashing password
        // $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('Success', 'Your account has been created!');
    }
}