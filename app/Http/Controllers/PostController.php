<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {

        return view('posts.index', [
            // eager load the category and get the results
            // latest() adds a order-by constraint (ie. enables us to sort by a particular parameter) -- default is "published_at"
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
