<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;
class SessionController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // validate request
        $credintials = request()->validate([
            'email' => 'required|email', // the inverse of unique
            'password' => 'required'
        ]);

        // validation failed... go back and never execute the rest

        // check the user credintials and log user in
        if( auth()->attempt( $credintials ) )
        {
            session()->regenerate(); // session fixation

            return redirect('/')->with('success', 'Welcome Back!');
        }

        throw ValidationException::withMessages([
            'email' => 'your provided credintials could not be verified'
        ]);
        
        // return back()->withInput()->withErrors(['email' => 'your provided credintials could not be verified']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', "Goodbye");
    }
}
