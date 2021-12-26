<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all() {
        return collect(File::files(resource_path("posts")))
            ->map(fn($file)=>YamlFrontMatter::parseFile($file))
            ->map(fn($document)=> new Post(
                $document->title,
                $document->excerpt, 
                $document->date,
                $document->body(),
                $document->slug
            ));
    
    }

    public static function find($slug) {
        // if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
        //     // Laravel has built-in exception for URL's not found, so use "ModelNotFoundException()" over "abort(404)" when possible.
        //     throw new ModelNotFoundException();
        // }

        // // 10k users are accessing the same URL, means $post needs to be run 10k times.
        // // Expensive operations such as these, can be cached.
        // return cache()->remember("posts.{$slug}", now()->addMinutes(20), fn() => file_get_contents($path));

        // Of all the blog posts, find the one with a slug that matches the one that was requested.
        return static::all()->firstWhere('slug', $slug);
    }
}

