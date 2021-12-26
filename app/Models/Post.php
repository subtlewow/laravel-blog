<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post {
    public static function all() {
        // Purpose of this fn is to remove the need for hard coding the content, but rather we can just 

        // Import "Illuminate\Support\Facades"; which is a class that gives us static access to all sorts of functionality.
        
        // return File::files(resource_path("posts/")); 
        //      -- We don't want SplFileInfo objects, but rather we want the contents of each file respectively; so to get the contents
        //         we can use the array_map() function which basically apply a callback function to each element in the array.

        $files = File::files(resource_path('posts/'));

        return array_map(fn($file) => $file->getContents(), $files);

        
    }

    public static function find($slug) {
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            // Laravel has built-in exception for URL's not found, so use "ModelNotFoundException()" over "abort(404)" when possible.
            throw new ModelNotFoundException();
        }

        // 10k users are accessing the same URL, means $post needs to be run 10k times.
        // Expensive operations such as these, can be cached.
        return cache()->remember("posts.{$slug}", now()->addMinutes(20), fn() => file_get_contents($path));
    }
}