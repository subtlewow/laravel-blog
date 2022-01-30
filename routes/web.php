<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

// Route::get -- used for presenting/viewing something
// Route::post -- changing something

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);

/**
 *  Middleware is used to inspect and filter incoming http requests (bridge between request and response)
 *  -- controls how to respond to an incoming http request
 *  middleware('guest') means only guests can access this route
 */

// only if user is a guest can they access the register route
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

// only if user is a guest can they access the login route (which loads the login view)
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

// only if user is authenticated (ie. logged in) can they access the logout route
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

