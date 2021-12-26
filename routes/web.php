<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all() // $posts
    ]);
});

Route::get('posts/{post}', function($slug) {
    // Load each post file by its slug and pass it to a view called "post"
    $post = Post::find($slug);
    
    return view('post', [
        'file' => $post
    ]);



})->where('post', '[A-z_\-]+'); // Constraining wildcard to only characters, underscores and dashes of any length.
