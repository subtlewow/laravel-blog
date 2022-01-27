<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest();

        if (request('search')) {
            $posts
                ->where('title', 'like', '%'.request('search').'%')
                ->orWhere('body', 'like', '%'.request('search').'%');
        }

        return view('posts', [
            // eager load the category and get the results

            // latest() adds a order-by constraint (ie. enables us to sort by a particular parameter) -- default is "published_at"
            'posts' => $posts->get(),
            'categories' => Category::all()
        ]);
    }
}
