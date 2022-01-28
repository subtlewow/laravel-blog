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
     * Creates new user from the form data validated & submitted
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

        // previously, password was not encrypted -- encrypting password
        $attributes['password'] = bcrypt($attributes['password']);

        // using the data submitted, create a new user
        User::create($attributes);

        // once form submitted redirect the user
        return redirect('/');
    }
}
