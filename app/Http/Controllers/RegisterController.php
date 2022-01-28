<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

        // Called "Validation Rules" (there is a whole list of them, need to google)

        // checks every form parameter and makes sure they're valid
        // to ensure no duplicates and that every entry is unique -- Rule::unique('[tablename]', '[column]')
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        // using the data submitted, create a new user (note: mutator (setPasswordAttribute) has been created in the model to encrypt password)
        User::create($attributes);

        // creating flash message
        session()->flash('success', 'Your account has been created.');

        // once form submitted redirect the user
        return redirect('/');
    }
}
