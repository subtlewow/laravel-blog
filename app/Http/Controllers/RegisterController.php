<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

// Handles the logic behind form submission
class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create-register');
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
        $user = User::create($attributes);

        // user login
        auth()->login($user);

        // with() is used for eager loading which means that along the main model Laravel will preload the relationships you specify.
        // With eager loading you only run one additional DB query instead of one for every model in the collection

        // once form submitted redirect the user to home page, with the $key and flash message
        return redirect('/')->with('success', 'Your account has been created.');
    }
}
