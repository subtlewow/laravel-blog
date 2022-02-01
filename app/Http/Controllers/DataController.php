<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function get() {
        return view('data.user', [
            'dataCollection' => User::all()
        ]);
    }
}
