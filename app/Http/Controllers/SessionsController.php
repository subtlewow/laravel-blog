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
        /**
         * NOTES:
         *
         * #1: Rule::exists() -- validating whether or not email has been registered; could be a security risk (ie. a malicious user could potentially check for whether or not user x is registered for this site) -- optional, depends on type of application being developed
         * #2: good practice to put "happy path" on the bottom and the "guard specific clauses" on the top (review EP51 if confused in L8FromScratch)
         */

        // #1
        // validates each input parameter submitted from the form
        $attributes = request()->validate([
            'email' => ['required', Rule::exists('users', 'email')],
            'password' => ['required']
        ]);

        // #2
        // authentication success, redirects and flashes message
        if (!auth()->attempt($attributes)) {
            // when authentication fails, throw a validation exception with a message
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

         // regenerate session id -> prevents session fixation (attacker attempts to steal ID of user sessions after they login)
         session()->regenerate();

         // redirect with success flash message
         return redirect('/')->with('success', 'Welcome Back!');

    }

    /**
     * Logs the user out, redirects to home page and raises a flash message
     *
     * @return void
     */
    public function destroy()
    {
        // logs user out
        auth()->logout();

        // redirects and flashes message
        return redirect('/login')->with('success', 'Goodbye!');
    }
}
