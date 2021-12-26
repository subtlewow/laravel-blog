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
    return view('posts');
});

// Find a post by its slug (ie. part of a URL) and pass it to a view called "post"
Route::get('posts/{post}', function($slug) {
    // Calling $file in a blade template will return the file contents stored in $post
    return view('post',[
        'file' => Post::find($slug) // $file
    ]);

})->where('post', '[A-z_\-]+'); // Constraining wildcard to only characters, underscores and dashes of any length.
