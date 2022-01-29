<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    /**
     * Loads the login view
     *
     * @return void
     */
    public function create() {
        return view('sessions.create-login');
    }

    /**
     * Validate and authenticate the login request
     *
     * @return void
     */
    public function store() {
        // validate request

        // Rule::exists() -- could be a security risk (ie. could check for whether or not user x is registered for this site? )
        // validates each input parameter
        $attributes = request()->validate([
            'email' => ['required', Rule::exists('users', 'email')],
            'password' => ['required']
        ]);

        // authentication success, redirects and flashes message
        if (auth()->attempt($attributes)) {
            // regenerate session id -> prevents session fixation (attacker attempts to steal ID of user sessions after they login)
            session()->regenerate();

            // redirect with success flash message
            return redirect('/')->with('success', 'Welcome Back!');
        }

        // when authentication fails, throw a validation exception with a message
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);

    }

    /**
     * Logs the user out, redirects to home page and raises a flash message
     *
     * @return void
     */
    public function destroy()
    {
        auth()->logout();

        return redirect('/login')->with('success', 'Goodbye!');
    }
}
