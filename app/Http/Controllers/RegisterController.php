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

    /**
     * Submits POST request and saves User attributes
     *
     * @return void
     */
    public function store() {

        // checks every form parameter and makes sure they're valid
        $attributes = request()->validate([
            'name' => 'required',
            'username' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        User::create($attributes);

        return redirect('/');
    }
}
